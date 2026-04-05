<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RequestedMusic;

class RequestedMusicController extends Controller
{
    public function index(){
        $requestedMusic = RequestedMusic::all();

        return response()->json([
            "success" => true,
            "message" => "List of requested music",
            "requested_music" => $requestedMusic
        ]);
    }
}
