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
                "accepted" => false
            ],
            [
                "author" => "Alma Együttes",
                "title" => "Örök almáskert",
                "length" => "2:37",
                "accepted" => false
            ],
            [
                "author" => "gy3r3k3k",
                "title" => "AAAAAAAAAA",
                "length" => "5:59",
                "accepted" => false
            ],
            [
                "author" => "Falco",
                "title" => "Jeanny, part 1",
                "length" => "6:00",
                "accepted" => false
            ],
            [
                "author" => "Steklovata",
                "title" => "Dva Mafona",
                "length" => "3:34",
                "accepted" => true
            ]
        ];

        foreach ($acceptedMusic as $music) AcceptedMusic::create($acceptedMusic);
    }
}