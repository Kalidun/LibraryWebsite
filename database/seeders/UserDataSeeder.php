<?php

namespace Database\Seeders;

use App\Models\UserData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserData::create([
            'user_id' => 1,
        ]);
        // UserData::create([
        //     'user_id' => 2,
        // ]);
        // UserData::create([
        //     'user_id' => 3,
        // ]);
    }
}
