<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AcceptableMusic;
use Illuminate\Http\Request;

class AcceptableMusicController extends Controller
{
    public function index(){
        $acceptableMusic = AcceptableMusic::all();
        return response()->json([
            "success" => true,
            "message" => "List of acceptable music",
            "acceptableMusic" => $acceptableMusic
        ]);
    }

    public function store(Request $request){
        AcceptableMusic::create($request->all());
        return response()->json([
            "success" => true,
            "message" => "New music added to the waitlist",
            "music" => $request->all()
        ], 201);
    }
}
