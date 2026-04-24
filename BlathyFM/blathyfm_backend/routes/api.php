<?php

use App\Http\Controllers\Api\AcceptableMusicController;
use App\Http\Controllers\Api\AcceptedMusicController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MusicController;
use App\Http\Controllers\Api\PlayedListController;
use App\Http\Controllers\Api\PlaylistController;
use App\Http\Controllers\Api\RequestedMusicController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PendingUserController;
use Illuminate\Support\Facades\Route;

// Csak bejelentkezett felhasználóknak:
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // csak admin
    Route::middleware('role:admin')->get('/admin/home', function () {
        return response()->json(['message' => 'success!']);
    });
    Route::middleware('role:admin')->get('/admin/checkusers', function () {
        return response()->json(['message' => 'success']);
    });

    //Csak rendező
    Route::middleware('role:scheduler')->get('/scheduler/home', function () {
        return response()->json(['message' => 'success!']);
    });
    Route::middleware('role:scheduler')->get('/scheduler/check', function () {
        return response()->json(['message' => 'success!']);
    });
    Route::middleware('role:scheduler')->get('/scheduler/schedule', function () {
        return response()->json(['message' => 'success!']);
    });

    //csak diák
    Route::middleware('role:student')->get('/student/home', function () {
        return response()->json(['message' => 'success!']);
    });
    Route::middleware('role:student')->get('/student/request', function () {
        return response()->json(['message' => 'success!']);
    });
    Route::middleware('role:student')->get('/student/send', function () {
        return response()->json(['message' => 'success!']);
    });
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [PendingUserController::class, 'create']);

Route::get('/pending_users', [PendingUserController::class, 'index']);
Route::post('/pending_users', [PendingUserController::class, 'store']);
Route::patch('/pending_users', [PendingUserController::class, 'store']);

Route::get('/music/{id}', [MusicController::class, 'show']);
Route::get('/music', [MusicController::class, 'index']);

Route::get('/playlist', [PlaylistController::class, 'index']);
Route::put('/playlist', [PlaylistController::class, 'update']);
Route::get('/playedlist', [PlayedListController::class, 'index']);

Route::get('/accepted_music', [AcceptedMusicController::class, 'index']);
Route::get('/acceptable_music', [AcceptableMusicController::class, 'index']);
Route::post('/new_music', [AcceptableMusicController::class, 'store']);
//RequestedMusic route -» api/requestedMusic
Route::get('/request', [RequestedMusicController::class, 'index']);
Route::post('/request', [RequestedMusicController::class, 'store']);

Route::post('/accepted_music', [AcceptedMusicController::class, 'store']);

Route::delete('/music_played/{id}', [AcceptedMusicController::class, 'delete']);
Route::get('/music_played', [AcceptedMusicController::class, 'save']);