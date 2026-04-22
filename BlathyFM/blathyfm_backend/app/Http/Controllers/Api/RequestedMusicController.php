<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\RequestedMusic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestedMusicController extends Controller
{
    public function index(){
        $requestedMusic = DB::table('requested_music')
            ->join('music', 'requested_music.link', '=', 'music.link')
            ->select('music.id', 'music.author', 'music.title', 'music.length', 'music.link')
            ->get();

        return response()->json([
            "success" => true,
            "message" => "List of requested music",
            "requested_music" => $requestedMusic
        ]);
    }

    public function store(Request $request){
        logger([
            'received_id' => $request->id,
            'exists' => Music::where('id', $request->id)->exists()
        ]);
        $email = $request->email;
        $musicId = $request->id;
        $music = Music::find($musicId);
        $message = $request->message;
        $requested = [
            'email' => $email,
            'author' => $music->author,
            'title' => $music->title,
            'length' => $music->length,
            'link' => $music->link,
            'message' => $message
        ];

        RequestedMusic::create($requested);

        return response()->json([
            "success" => true,
            "message" => "Sikeresen rögzítettük a zenét a listában",
            "requested_music" => $requested
        ], 201);
    }

}
