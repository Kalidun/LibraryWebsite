<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'title',
            'author' => 'author',
            'category_id' => 1
        ]);
        Book::create([
            'title' => 'title2',
            'author' => 'author2',
            'category_id' => 2
        ]);
        Book::create([
            'title' => 'title3',
            'author' => 'author3',
            'category_id' => 2
        ]);
    }
}
