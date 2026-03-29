<?php

namespace App\Http\Controllers;

use App\Models\AcceptedMusic;
use Illuminate\Http\Request;

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
