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
        for($i = 0;$i < 10; $i++){
            Book::create([
                'title' => 'Book '.$i,
                'author' => 'Author '.$i,
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto deleniti modi animi!',
                'category_id' => rand(1, 3)
            ]);
        }
    }
}
