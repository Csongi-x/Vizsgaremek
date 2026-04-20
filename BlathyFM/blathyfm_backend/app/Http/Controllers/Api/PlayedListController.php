<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PlayedList;

class PlayedListController extends Controller
{
    public function index() {
        $playedList = PlayedList::all();
        return response()->json([
            "success" => true,
            "message" => "Lejátszott zenék",
            "played_list" => $playedList
        ]);
    }
}
