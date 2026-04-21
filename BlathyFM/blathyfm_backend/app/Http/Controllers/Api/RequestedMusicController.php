<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RequestedMusic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestedMusicController extends Controller
{
    public function index(){
        $requestedMusic = \DB::table('requested_music')->join('music', 'requested_music.link', '=', 'music.link')->select('music.id', 'music.author', 'music.title', 'music.length', 'music.link')->get();

        return response()->json([
            "success" => true,
            "message" => "List of requested music",
            "requested_music" => $requestedMusic
        ]);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'link' => 'required|string',
        ]);
        $requested = RequestedMusic::create([
            'link' => $validated['link'],
        ]);


        return response()->json([
            "success" => true,
            "message" => "Sikeresen rögzítettük a zenét a listában",
            "requested_music" => $requested
        ], 201);

    }

}
