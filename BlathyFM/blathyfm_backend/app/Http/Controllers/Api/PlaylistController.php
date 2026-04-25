<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index(){
        $playlist = Playlist::all();
        return response()->json([
            "success" => true,
            "message" => "Lejátszási lista",
            "playlist" => $playlist
        ]);
    }

    public function update(Request $request) {
        foreach (Playlist::all() as $element) Playlist::delete($element);
        foreach ($request->all() as $newElement) Playlist::create($newElement);
        return response()->json([
            "success" => true,
            "message" => "Lejátszási lista frissítve",
            "playlist" => Playlist::all()
        ]);
    }
}
