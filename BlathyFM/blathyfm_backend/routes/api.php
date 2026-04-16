<?php

use App\Http\Controllers\Api\AcceptableMusicController;
use App\Http\Controllers\Api\AcceptedMusicController;
use App\Http\Controllers\Api\MusicController;
use App\Http\Controllers\Api\RequestedMusicController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PendingUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // amihez token kell
});

Route::post('login', [UserController::class, 'login']);
Route::post('/register', [PendingUserController::class, 'create']);

Route::get('/pending_users', [PendingUserController::class, 'index']);
Route::post('/pending_users', [PendingUserController::class, 'store']);
Route::patch('/pending_users', [PendingUserController::class, 'store']);

Route::get('/music', [MusicController::class, 'index']);
Route::get('/accepted_music', [AcceptedMusicController::class, 'index']);
Route::get('/acceptable_music', [AcceptableMusicController::class, 'index']);
Route::post('/new_music', [AcceptableMusicController::class, 'store']);
//Még egy Route a lejátszott számoknak -> api/playedlist
//RequestedMusic route -» api/requestedMusic
//playlist -» api/playlist