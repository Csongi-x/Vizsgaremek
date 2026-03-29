<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Playlist;
use Illuminate\Http\Request;

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
