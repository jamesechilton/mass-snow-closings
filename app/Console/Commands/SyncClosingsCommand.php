<?php

namespace App\Console\Commands;

use App\Services\ClosingScraperService;
use Illuminate\Console\Command;

class SyncClosingsCommand extends Command
{
    protected $signature = 'closings:sync';

    protected $description = 'Sync snow closings from WCVB';

    public function handle(ClosingScraperService $scraper): int
    {
        $this->info('Fetching closings from WCVB...');

        $results = $scraper->sync();

        $this->info("Fetched: {$results['fetched']} entries");
        $this->info("Matched: {$results['matched']} towns");
        $this->info("Created: {$results['created']} new closures");
        $this->info("Updated: {$results['updated']} existing closures");
        $this->info("Deactivated: {$results['deactivated']} closures");

        if (! empty($results['errors'])) {
            foreach ($results['errors'] as $error) {
                $this->error($error);
            }

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
