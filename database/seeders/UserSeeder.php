<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => bcrypt('user'),
            ],

        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
