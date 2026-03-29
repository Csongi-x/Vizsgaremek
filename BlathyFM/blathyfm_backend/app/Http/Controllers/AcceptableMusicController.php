<?php

namespace App\Http\Controllers;

use App\Models\AcceptableMusic;
use Illuminate\Http\Request;

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
