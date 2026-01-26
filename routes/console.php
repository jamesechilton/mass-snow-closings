<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('closings:sync')
    ->everyFiveMinutes()
    ->withoutOverlapping()
    ->appendOutputTo(storage_path('logs/closings-sync.log'));
