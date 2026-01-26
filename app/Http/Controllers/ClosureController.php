<?php

namespace App\Http\Controllers;

use App\Models\Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ClosureController extends Controller
{
    public function index()
    {
        $data = Cache::remember('active_closures', 30, function () {
            $allClosures = Closure::with('town')
                ->active()
                ->get();

            $totalCount = $allClosures->count();

            $closuresWithVideos = $allClosures
                ->filter(function ($closure) {
                    $slug = $closure->town->slug ?? null;
                    if (! $slug) {
                        return false;
                    }

                    $exists = File::exists(public_path("videos/{$slug}.mp4"));
                    if (! $exists) {
                        Log::warning("Missing video file for active closure: {$slug}.mp4");
                    }

                    return $exists;
                })
                ->map(function ($closure) {
                    return [
                        'slug' => $closure->town->slug,
                        'status' => $closure->status_text,
                    ];
                })
                ->values();

            return [
                'closures' => $closuresWithVideos,
                'count' => $totalCount,
            ];
        });

        $data['updated_at'] = now()->toIso8601String();

        return response()->json($data);
    }
}
