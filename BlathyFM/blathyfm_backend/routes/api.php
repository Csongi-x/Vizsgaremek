<?php

use App\Http\Controllers\Api\MusicController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PendingUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // amihez token kell
});

Route::post('login', [UserController::class, 'login']);
Route::get('/music', [MusicController::class, 'index']);
Route::post('/register', [PendingUserController::class, 'create']);