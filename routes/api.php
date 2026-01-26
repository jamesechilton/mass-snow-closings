<?php

use App\Http\Controllers\ClosureController;
use Illuminate\Support\Facades\Route;

Route::get('/closures', [ClosureController::class, 'index']);
