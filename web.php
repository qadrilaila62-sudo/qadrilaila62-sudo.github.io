<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;

// Mengarahkan halaman utama (/) langsung ke dashboard
Route::get('/', [DashboardController::class, 'index']);