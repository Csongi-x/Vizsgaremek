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

        // Csak a linkeket gyűjtjük ki egy egyszerű tömbbe
        $excludedLinks = RequestedMusic::pluck('link')
            ->merge(Playlist::pluck('link'))
            ->unique()
            ->toArray();

        // Kiszűrjük azokat, amiknek a linkje benne van a tiltólistában
        $musicJson = $music->filter(function($m) use ($excludedLinks) {
            return !in_array($m->link, $excludedLinks);
        })->values(); //újra elindul a tömb 0-ról

        return response()->json([
            "success" => true,
            "message" => "Zenék",
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
