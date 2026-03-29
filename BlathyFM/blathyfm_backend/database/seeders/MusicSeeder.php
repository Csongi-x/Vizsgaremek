<?php

namespace Database\Seeders;

use App\Models\Music;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $music = [
            [
                "author" => "Steklovata",
                "title" => "Dva Mafona",
                "length" => "3:34",
                "genre" => "hit",
                "link" => "https://youtu.be/tmSGGWyauqo?si=2NvO2HAMQg4WWn8p"
            ],
            [
                "author" => "Steklovata",
                "title" => "Korablik",
                "length" => "4:13",
                "genre" => "hit",
                "link" => "https://youtu.be/v7Zf5L9FMNU?list=OLAK5uy_n1iQvIM_Z_jRfvz620ZIKX5NuGEulbk_0"
            ],
            [
                "author" => "ABBA",
                "title" => "Money, Money, Money",
                "length" => "3:07",
                "genre" => "hit",
                "link" => "https://youtu.be/ETxmCCsMoD0?si=eucYt_PsqO7ohCoS"
            ],
            [
                "author" => "ABBA",
                "title" => "Money, Money, Money",
                "length" => "3:07",
                "genre" => "hit",
                "link" => "https://youtu.be/ETxmCCsMoD0?si=eucYt_PsqO7ohCoS"
            ],
            [
                "author" => "Mo-Do",
                "title" => "Hamlet",
                "length" => "4:11",
                "genre" => "electronic",
                "link" => "https://youtu.be/lPammWdjxD4?si=d-McbRU_GrOMltpC"
            ],
            [
                "author" => "Rammstein",
                "title" => "Amerika",
                "length" => "4:17",
                "genre" => "metal",
                "link" => "https://youtu.be/Rr8ljRgcJNM?si=IrBan0o4q8mpGJi1"
            ]
        ];

        foreach ($music as $m) Music::create($m);
    }
}