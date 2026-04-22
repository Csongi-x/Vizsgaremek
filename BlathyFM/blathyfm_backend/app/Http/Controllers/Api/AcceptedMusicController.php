<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AcceptableMusic;
use App\Models\Music;
use App\Models\AcceptedMusic;
use App\Models\Playlist;
use App\Models\RequestedMusic;
use Illuminate\Http\Request;

class AcceptedMusicController extends Controller
{
    public function index(){
        $acceptedMusic = AcceptedMusic::all();
        return response()->json([
            "success" => true,
            "message" => "Elfogadott/elutasított zenék listája",
            "acceptedMusic" => $acceptedMusic,
        ]);
    }
    public function store(Request $request){
        $music = $request->all();
        foreach($music as $song) {
            AcceptedMusic::create([
                "author" => $song['author'],
                "title" => $song['title'],
                "length" => $song['length'],
                "link" => $song['link'],
                "accepted" => $song['accepted']
            ]);
            AcceptableMusic::destroy($song);
            if ($song['accepted']) Music::create($song);
        }

        return response()->json([
            'success' => true,
            'message' => 'Zenék sikeresen feldolgozva!',
            'processed_music' => $music
        ]);
    }
    public function delete($id){
        $music = Playlist::find($id);
        if($music){
            $music->delete();
            return response()->json(['status' => 'success', 'message' => 'Sikeresen törölve a playlistről!']);
        }
        else{
            return response()->json(['error' => 'Zene nem található!']);
        }
    }
    public function save(Request $request){
        $musicList = $request->input('music_list', []);
        foreach($musicList as $entry){
            $requestedMusic = RequestedMusic::find($entry['id']);
            if($requestedMusic){
                if($entry['status'] == 'accepted'){
                    Playlist::create($requestedMusic->toArray());
                }

                //minden esetben törölje utána
                $requestedMusic->delete();
            }
        }
        return response()->json(['status' => 'success']);
    }
}
