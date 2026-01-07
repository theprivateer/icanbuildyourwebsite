<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware(ProtectAgainstSpam::class);
