<?php

namespace Database\Seeders;

use App\Models\PlayedList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayedListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $played_list = [
            [
                "author" => "Bárány Attila X Delerium",
                "title" => "Silence 2008",
                "length" => "3:34",
                "link" => "https://youtu.be/qLncpt--7XY?si=Fz3FX-nZVukbKk7G"
            ],
            [
                "author" => "Kiwi",
                "title" => "Neked adom (Club mix)",
                "length" => "4:33",
                "link" => "https://youtu.be/rkMeJHch8zU?si=dNGuOrIbkeeL1SjH"
            ],
            [
                "author" => "Bogdan DLP",
                "title" => "Habibi",
                "length" => "2:10",
                "link" => "https://youtu.be/TzsGpTZK9J0?si=xj7rfNb9zxKwdtLw"
            ],
            [
                "author" => "@raresmaris X Bodgan DLP",
                "title" => "Guli Guli",
                "length" => "2:31",
                "link" => "https://youtu.be/fF-fev61CTU?si=9RgSONaZYAhWybH_"
            ]
        ];

        foreach ($played_list as $played) PlayedList::create($played);
    }
}
