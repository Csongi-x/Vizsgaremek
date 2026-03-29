<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ["role" => "student"],
            ["role" => "admin"],
            ["role" => "scheduler"]
        ];

        foreach ($roles as $role) Role::create($role);
    }
}