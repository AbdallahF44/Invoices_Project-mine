<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'عبدالله فوزي',
             'email' => 'abdallah@gmail.com',
             'email_verified_at' => now(),
             'password' => '$2y$10$38rxnnVKXuPr99hRt/n55.kNO7Liy68MCQn3GoXBkw.Hoc8OqmqJK', // password
             'remember_token' => Str::random(10),
         ]);
    }
}
