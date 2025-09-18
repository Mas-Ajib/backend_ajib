<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    // Tambahkan di akhir routes/web.php
Route::prefix('api')->group(function () {
    Route::get('/test', function () {
        return response()->json(['message' => 'API is working!']);
    });

    Route::apiResource('jenis-pegawais', \App\Http\Controllers\JenisPegawaiController::class);
    Route::apiResource('status-pegawais', \App\Http\Controllers\StatusPegawaiController::class);
    Route::apiResource('agamas', \App\Http\Controllers\AgamaController::class);
    Route::apiResource('units', \App\Http\Controllers\UnitController::class);
    Route::apiResource('subunits', \App\Http\Controllers\SubunitController::class);
});
    
});

require __DIR__.'/auth.php';

