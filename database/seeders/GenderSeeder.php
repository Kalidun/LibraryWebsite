<?php

namespace Database\Seeders;

use App\Models\GenderUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gender = ['Male', 'Female', 'Other'];
        foreach ($gender as $key => $value) {
            GenderUser::create([
                'gender' => $value
            ]);
        }
    }
}
