<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ["genre" => "hit"],
            ["genre" => "rock"],
            ["genre" => "pop"],
            ["genre" => "hip-hop"],
            ["genre" => "jazz"],
            ["genre" => "reggae"],
            ["genre" => "alternative"],
            ["genre" => "vaporwave"],
            ["genre" => "country"],
            ["genre" => "electronic"],
            ["genre" => "folk"],
            ["genre" => "other"]
        ];

        foreach ($genres as $genre) Genre::create($genre);
    }
}