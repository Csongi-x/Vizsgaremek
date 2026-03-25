<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "email" => "susan.csongor.gyorgy@blathy.info",
                "full_name" => "Susán Csongor György",
                "role" => "student",
                "password" => Hash::make('kiscica92')
            ],
            [
                "email" => "lance.strulovitch@blathy.info",
                "full_name" => "Lance Strulovitch",
                "role" => "student",
                "password" => Hash::make('astonmartin12345')
            ],
            [
                "email" => "feng.xie@blathy.info",
                "full_name" => "Feng Xie",
                "role" => "student",
                "password" => Hash::make('■■■■■■■■■■■')
            ],
            [
                "email" => "elromlott.andras.andris@blathy.info",
                "full_name" => "Elromlott András Andris",
                "role" => "student",
                "password" => Hash::make('私たちは犬を飼っていません')
            ],
            [
                "email" => "rendszergazda@blathy.info",
                "full_name" => "Harangozó Zsolt",
                "role" => "admin",
                "password" => Hash::make('kutyi8888888')
            ],
            [
                "email" => "elnabulsy.csongor.alan@blathy.info",
                "full_name" => "El-Nabulsy Csongor Alan",
                "role" => "student",
                "password" => Hash::make('***********')
            ],
            [
                "email" => "klebesz.kinga@blathy.info",
                "full_name" => "Klébesz Kinga",
                "role" => "scheduler",
                "password" => Hash::make('kutyi8888887')
            ]
        ];

        foreach ($users as $user) User::create($user);
    }
}
