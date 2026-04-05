<?php

use App\Http\Controllers\Api\MusicController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // amihez token kell
});

Route::post('login', [UserController::class, 'login']);
Route::get('/music', [MusicController::class, 'index']);