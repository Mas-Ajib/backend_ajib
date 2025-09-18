<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisPegawaiController;
use App\Http\Controllers\StatusPegawaiController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SubunitController;

// Semua routes menjadi public (tanpa auth)
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

// API Resources tanpa middleware auth
Route::apiResource('jenis-pegawais', JenisPegawaiController::class);
Route::apiResource('status-pegawais', StatusPegawaiController::class);
Route::apiResource('agamas', AgamaController::class);
Route::apiResource('units', UnitController::class);
Route::apiResource('subunits', SubunitController::class);

// Routes dengan filter (tetap public)
Route::get('/status-pegawais-filtered', [StatusPegawaiController::class, 'indexWithFilter']);
Route::get('/subunits-filtered', [SubunitController::class, 'indexWithFilter']);