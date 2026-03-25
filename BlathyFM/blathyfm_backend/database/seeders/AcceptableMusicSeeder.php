<?php

namespace Database\Seeders;

use App\Models\AcceptedMusic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcceptableMusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acceptableMusic = [
            [
                "author" => "bl00dwave",
                "title" => "bodies",
                "length" => "2:02",
                "genre" => "vaporwave",
                "link" => "https://youtu.be/nLjQi9HFKjI?si=12fIQlqlkRB4fp4A",
            ],
            [
                "author" => "Alphaville",
                "title" => "Big in Japan",
                "length" => "4:45",
                "genre" => "hit",
                "link" => "https://youtu.be/E2HeDHkL9kg?si=KzEccw1xcHXFwbBL",
            ],
            [
                "author" => "Falco",
                "title" => "Einzelhaft",
                "length" => "4:03",
                "genre" => "hit",
                "link" => "https://youtu.be/e-wy1CvO6zQ?si=IwbGptusgzRFY0Z2",
            ],
            [
                "author" => "Falco",
                "title" => "Rock Me Amadeus",
                "length" => "3:23",
                "genre" => "hit",
                "link" => "https://youtu.be/y-H895vrIU8?si=UR-Hk8gCZbLJMLjM",
            ]
        ];

        foreach ($acceptableMusic as $music) AcceptedMusic::create($acceptableMusic);
    }
}
