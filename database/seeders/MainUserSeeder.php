<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'username' => 'Gaga',
            'email' => 'gaga@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'username' => 'Gugu',
            'email' => 'gugu@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
