<?php

namespace Database\Seeders;

use App\Models\chat\ChatStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChatStatus::create([
            'status' => 'read'
        ]);
        ChatStatus::create([
            'status' => 'unread'
        ]);
    }
}
