<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RequestedMusic;

class RequestedMusicController extends Controller
{
    public function index(){
        $requestedMusic = \DB::table('requested_music')->join('music', 'requested_music.music_id', '=', 'music.id')->select('music.id', 'music.author', 'music.title', 'music.length', 'music.link')->get();

        return response()->json([
            "success" => true,
            "message" => "List of requested music",
            "requested_music" => $requestedMusic
        ]);
    }
    public function store(Request $request){
        $data = $request->all([]);
        RequestedMusic::create($data);
        return response()->json([
            "success" => true,
            "message" => "Sikeresen rögzítettük a zenét a listában",
            "requested_music" => $data
        ], 201);

    }

}
