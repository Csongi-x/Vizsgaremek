<?php

namespace Database\Seeders;

use App\Models\RequestedMusic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestedMusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requested_music = [
            [
                "email" => "elromlott.andras.andris@blathy.info",
                "author" => "Steklovata",
                "title" => "Korablik",
                "length" => "4:13",
                "link" => "https://youtu.be/v7Zf5L9FMNU?list=OLAK5uy_n1iQvIM_Z_jRfvz620ZIKX5NuGEulbk_0",
                "message" => "tizen kettő negyvenötkór nyomjád lefelé béjbéééééééééééééé sigma"
            ]
        ];

        foreach ($requested_music as $rm) RequestedMusic::create($rm);
    }
}
