<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookCategory::create([
            'name' => 'Programming',
        ]);
        BookCategory::create([
            'name' => 'Fantasy',
        ]);
        BookCategory::create([
            'name' => 'Adventure',
        ]);
    }
}
