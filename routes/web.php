<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/gestion-salas', [RoomController::class, 'index']);
    Route::post('/crear-sala', [RoomController::class, 'store']);
    Route::get('/gestion-reservas', [BookingController::class, 'index']);
    Route::get('/reservar', [BookingController::class, 'store']);
});
