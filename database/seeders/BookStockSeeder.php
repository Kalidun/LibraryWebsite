<?php

namespace Database\Seeders;

use App\Models\BookStock;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookStock::create([
            'book_id' => 1,
            'status_id' => 1
        ]);
        BookStock::create([
            'book_id' => 2,
            'status_id' => 3
        ]);
        BookStock::create([
            'book_id' => 3,
            'status_id' => 2
        ]);
    }
}
