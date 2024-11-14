<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('clear', function () {
    Artisan::call('clear-compiled');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/gestion-salas', [RoomController::class, 'index']);
    Route::post('/crear-sala', [RoomController::class, 'store']);
    Route::get('/gestion-reservas', [BookingController::class, 'index']);
    Route::get('/ver-reservas', [BookingController::class, 'showAll']);
    Route::post('/crear-reserva', [BookingController::class, 'store']);
});
