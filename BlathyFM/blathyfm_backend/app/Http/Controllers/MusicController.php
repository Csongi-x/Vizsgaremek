<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Playlist;
use App\Models\RequestedMusic;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index($link){
        $musics = Music::all();
        $requestedMusicAll = RequestedMusic::all();
        $playlists = Playlist::all();

        $MusicJson = [];

        foreach($musics as $music){
            if($music){
                if($music->link == RequestedMusic::all()->where("link", $link)->first() && $music->link == Playlist::all()->where("link", $link)->first()){
                    $MusicJson[] = $music;
                }
            }
        }

        return response()->json([
            "success" => true,
            "message" => "List of music that are not requested",
            "MusicJson" => $MusicJson
        ]);

    }
}
