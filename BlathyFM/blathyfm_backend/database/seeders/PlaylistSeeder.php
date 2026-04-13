<?php

namespace Database\Seeders;

use App\Models\Playlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $playlist = [
            [
                "order_number" => 1,
                "author" => "Mo-Do",
                "title" => "Hamlet",
                "length" => "4:11",
                "link" => "https://youtu.be/lPammWdjxD4?si=d-McbRU_GrOMltpC"
            ],
            [
                "order_number" => 2,
                "author" => "Rammstein",
                "title" => "Amerika",
                "length" => "4:17",
                "link" => "https://youtu.be/Rr8ljRgcJNM?si=IrBan0o4q8mpGJi1"
            ]
        ];

        foreach ($playlist as $p) Playlist::create($p);
    }
}