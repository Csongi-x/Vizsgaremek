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
        Playlist::truncate();
        $order_number = 0;
        foreach ($request->all() as $newElement) {
            $order_number++;
            $e = [
                'order_number' => $order_number,
                'author' => $newElement['author'],
                'title' => $newElement['title'],
                'length' => $newElement['length'],
                'link' => $newElement['link']
            ];
            Playlist::create($e);
        }
        return response()->json([
            "success" => true,
            "message" => "Lejátszási lista frissítve",
            "playlist" => Playlist::all()
        ]);
    }
}
