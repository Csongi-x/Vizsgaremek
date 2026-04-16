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
            "message" => "Elfogadás/elutasítás előtt álló zenék listája",
            "acceptableMusic" => $acceptableMusic
        ]);
    }

    public function store(Request $request){
        AcceptableMusic::create($request->all());
        return response()->json([
            "success" => true,
            "message" => "A zene sikeresen beküldve!",
            "music" => $request->all()
        ], 201);
    }
}
