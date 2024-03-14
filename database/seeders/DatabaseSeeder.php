<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BookCategorySeeder::class,
            BookStatusSeeder::class,
            MainUserSeeder::class,
            UserDataSeeder::class,
            GenderSeeder::class,
            // BookSeeder::class,
            // Book::factory(25)->create(),
            // BookStockSeeder::class,
            // BorrowedBookSeeder::class
        ]);
    }
}
