<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AcceptableMusic;

class AcceptableMusicController extends Controller
{
    public function index(){
        $acceptablemusic = AcceptableMusic::all();
        return response()->json([
            "success" => true,
            "message" => "List of acceptable music",
            "acceptablemusic" => $acceptablemusic
        ]);
    }
}
