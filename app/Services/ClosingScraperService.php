<?php

namespace App\Services;

use App\Models\Closure;
use App\Models\Town;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ClosingScraperService
{
    private const WCVB_URL = 'https://www.wcvb.com/weather/closings';

    private array $townLookup = [];

    public function __construct()
    {
        $this->buildTownLookup();
    }

    public function sync(): array
    {
        $results = [
            'fetched' => 0,
            'matched' => 0,
            'created' => 0,
            'updated' => 0,
            'deactivated' => 0,
            'errors' => [],
        ];

        try {
            $closings = $this->fetchClosings();
            $results['fetched'] = count($closings);

            $matchedTownIds = [];

            foreach ($closings as $closing) {
                $town = $this->matchTown($closing['name']);
                if ($town) {
                    $results['matched']++;
                    $matchedTownIds[] = $town->id;

                    $closure = Closure::where('town_id', $town->id)
                        ->where('is_active', true)
                        ->first();

                    if ($closure) {
                        $closure->update([
                            'last_seen_at' => now(),
                            'source_text' => $closing['name'],
                            'status_text' => $closing['status'],
                        ]);
                        $results['updated']++;
                    } else {
                        Closure::create([
                            'town_id' => $town->id,
                            'source_text' => $closing['name'],
                            'status_text' => $closing['status'],
                            'detected_at' => now(),
                            'last_seen_at' => now(),
                            'is_active' => true,
                        ]);
                        $results['created']++;
                    }
                }
            }

            $deactivated = Closure::where('is_active', true)
                ->whereNotIn('town_id', $matchedTownIds)
                ->update(['is_active' => false]);

            $results['deactivated'] = $deactivated;

        } catch (\Exception $e) {
            Log::error('Closing scraper error: '.$e->getMessage());
            $results['errors'][] = $e->getMessage();
        }

        return $results;
    }

    private function fetchClosings(): array
    {
        $response = Http::timeout(30)
            ->withHeaders([
                'User-Agent' => 'Mozilla/5.0 (compatible; MassSnowClosings/1.0)',
            ])
            ->get(self::WCVB_URL);

        if (! $response->successful()) {
            throw new \RuntimeException('Failed to fetch WCVB closings: HTTP '.$response->status());
        }

        return $this->parseHtml($response->body());
    }

    private function parseHtml(string $html): array
    {
        $closings = [];

        libxml_use_internal_errors(true);
        $doc = new \DOMDocument;
        $doc->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $xpath = new \DOMXPath($doc);
        $items = $xpath->query("//*[contains(@class, 'weather-closings-data-item')]");

        foreach ($items as $item) {
            $nameNode = $xpath->query(".//*[contains(@class, 'weather-closings-data-name')]", $item)->item(0);
            $statusNode = $xpath->query(".//*[contains(@class, 'weather-closings-data-status')]", $item)->item(0);

            $name = $nameNode ? trim($nameNode->textContent) : '';
            $status = $statusNode ? trim($statusNode->textContent) : 'Closed';

            // Clean up whitespace in status
            $status = preg_replace('/\s+/', ' ', $status);
            $status = trim($status) ?: 'Closed';

            if (! empty($name)) {
                $closings[] = [
                    'name' => $name,
                    'status' => $status,
                ];
            }
        }

        return $closings;
    }

    private function buildTownLookup(): void
    {
        $towns = Town::all();

        foreach ($towns as $town) {
            $normalized = $this->normalizeName($town->name);
            $this->townLookup[$normalized] = $town;

            $withSchools = $normalized.' public schools';
            $this->townLookup[$withSchools] = $town;

            $withPS = $normalized.' ps';
            $this->townLookup[$withPS] = $town;
        }
    }

    private function matchTown(string $closingName): ?Town
    {
        $normalized = $this->normalizeName($closingName);

        if (isset($this->townLookup[$normalized])) {
            return $this->townLookup[$normalized];
        }

        foreach ($this->townLookup as $key => $town) {
            if (Str::startsWith($normalized, $this->normalizeName($town->name).' ')) {
                return $town;
            }
        }

        return null;
    }

    private function normalizeName(string $name): string
    {
        $name = strtolower(trim($name));
        $name = preg_replace('/[^a-z0-9\s]/', '', $name);
        $name = preg_replace('/\s+/', ' ', $name);

        return $name;
    }
}
