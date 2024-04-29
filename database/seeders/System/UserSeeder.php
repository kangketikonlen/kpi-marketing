<?php

namespace Database\Seeders\System;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'name' => "Support Sistem",
            'username' => "support",
            'password' => bcrypt('Kangketik@2023')
        ]);

        User::create([
            'role_id' => 2,
            'name' => "Administrator",
            'username' => "admin",
            'password' => bcrypt('admin@2024')
        ]);
    }
}
