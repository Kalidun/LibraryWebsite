<?php

namespace Database\Seeders;

use App\Models\BorrowedBook;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BorrowedBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BorrowedBook::create([
            'user_id' => 2,
            'book_id' => 1,
            'borrow_date' => now(),
            'return_date' => now()->addDays(7)
        ]);
        BorrowedBook::create([
            'user_id' => 3,
            'book_id' => 3,
            'borrow_date' => now(),
            'return_date' => now()->addDays(7)
        ]);
        BorrowedBook::create([
            'user_id' => 2,
            'book_id' => 2,
            'borrow_date' => now(),
            'return_date' => now()->addDays(7)
        ]);
    }
}
