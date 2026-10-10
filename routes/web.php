<?php

use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('kos.index'));

Route::resource('kos', KosController::class)
    ->parameters(['kos' => 'kos'])
    ->except('show');
Route::resource('kamar', KamarController::class)->except('show');