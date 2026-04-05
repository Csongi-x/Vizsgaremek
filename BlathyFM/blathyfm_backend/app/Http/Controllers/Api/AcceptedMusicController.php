<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AcceptedMusic;

class AcceptedMusicController extends Controller
{
    public function index(){
        $acceptedMusic = AcceptedMusic::all();
        return response()->json([
            "success" => true,
            "message" => "List of accepted and declined music",
            "acceptedMusic" => $acceptedMusic,
        ]);
    }
}
