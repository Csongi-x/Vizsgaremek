<?php

namespace App\Http\Controllers;

use App\Models\RequestedMusic;
use Illuminate\Http\Request;

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
