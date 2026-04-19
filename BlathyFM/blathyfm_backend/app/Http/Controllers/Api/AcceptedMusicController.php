<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $acceptedMusicList = $request->input('music_list', []);

        foreach($acceptedMusicList as $acceptedMusic){
            $musicId = $acceptedMusic['music_id'];
            $status = $acceptedMusic['status'];

            $music = AcceptedMusic::find($musicId);
            if($musicId){
                $music->status = $status;
                if($status == 'accepted'){
                    AcceptedMusic::create($music->toArray());
                }
                else{
                    $music->delete();
                }
            }
            return response()->json(['status' => 'success', 'message' => 'Zene sikeresen feldolgozva!']);
        }
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
