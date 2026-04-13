<?php

namespace Database\Seeders;

use App\Models\PendingUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PendingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendingUsers = [
            [
                "full_name" => "Tamás Krisztián",
                "email" => "tamas.krisztian@blathy.info",
                "password" => Hash::make("##########"),
                "role" => "student",
                "status" => "pending"
            ],
            [
                "full_name" => "Kicsi Arnold",
                "email" => "kicsi.arnold@blathy.info",
                "password" => Hash::make("krumplisteszta1234"),
                "role" => "student",
                "status" => "accepted"
            ],
            [
                "full_name" => "Remény-Nagy Olivér",
                "email" => "remeny.nagy.oliver@blathy.info",
                "password" => Hash::make(".,?!.,?!"),
                "role" => "student",
                "status" => "rejected"
            ]
        ];

        foreach ($pendingUsers as $pendingUser) PendingUser::create($pendingUser);
    }
}
