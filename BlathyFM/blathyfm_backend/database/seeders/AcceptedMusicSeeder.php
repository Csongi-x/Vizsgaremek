<?php

namespace Database\Seeders;

use App\Models\AcceptedMusic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcceptedMusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acceptedMusic = [
            [
                "author" => "Alma Együttes",
                "title" => "Almamánia",
                "length" => "3:32",
                "link" => "https://youtu.be/k9zMsRUfi1g?si=AlyxJz5O5ojQ_hX1",
                "accepted" => false
            ],
            [
                "author" => "Alma Együttes",
                "title" => "Örök almáskert",
                "length" => "2:37",
                "link" => "https://youtu.be/6qi-S1J6UaI?si=iPjpBUAAlazPoE3D",
                "accepted" => false
            ],
            [
                "author" => "gy3r3k3k",
                "title" => "AAAAAAAAAA",
                "length" => "5:56",
                "link" => "https://youtu.be/6qt-S1J6UaI?si=iPjrBUAAlazPoE2D",
                "accepted" => false
            ],
            [
                "author" => "Falco",
                "title" => "Jeanny, part 1",
                "length" => "5:59",
                "link" => "https://youtu.be/Urw-iutHw5E?si=xefL5ePBUDqYLy9C",
                "accepted" => false
            ],
            [
                "author" => "Steklovata",
                "title" => "Dva Mafona",
                "length" => "3:34",
                "link" => "https://youtu.be/tmSGGWyauqo?si=2NvO2HAMQg4WWn8p",
                "accepted" => true
            ]
        ];

        foreach ($acceptedMusic as $music) AcceptedMusic::create($music);
    }
}