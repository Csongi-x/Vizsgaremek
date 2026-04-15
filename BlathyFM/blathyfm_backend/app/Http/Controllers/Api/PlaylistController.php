<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    public function index(){
        $playlist = Playlist::all();

        return response()->json([
            "success" => true,
            "message" => "Playlist",
            "playlist" => $playlist
        ]);
    }
}
