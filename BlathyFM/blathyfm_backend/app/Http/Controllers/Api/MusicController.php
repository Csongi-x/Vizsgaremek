<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\Playlist;
use App\Models\RequestedMusic;

class MusicController extends Controller
{
    public function index(){
        $music = Music::all();
        $requestedMusic = RequestedMusic::select('link');
        $playlist = Playlist::select('link');
        $requestedMusicAll = $requestedMusic->union($playlist)->distinct()->get();

        $musicJson = [];

        foreach($music as $m) {
            $addable = true;
            foreach ($requestedMusicAll as $requested) {
                if ($m->link == $requested->link) $addable = false;
            }
            if ($addable) $musicJson[] = $m;
        }

        return response()->json([
            "success" => true,
            "message" => "(Be nem kért) zenék",
            "musicJson" => $musicJson
        ]);
    }

    public function show($id){
        $music = Music::find($id);
        return response()->json([
            "success" => true,
            "message" => "$id ID-jú zene adatai",
            "music" => $music
        ]);
    }
}
