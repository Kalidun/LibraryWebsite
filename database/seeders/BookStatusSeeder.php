<?php

namespace Database\Seeders;

use App\Models\BookStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookStatus::create([
            'name' => 'Available',
        ]);
        BookStatus::create([
            'name' => 'Borrowed',
        ]);
        BookStatus::create([
            'name' => 'Lost',
        ]);
        BookStatus::create([
            'name' => 'Damaged',
        ]);
    }
}
