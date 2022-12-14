<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(100)->has(\App\Models\Post::factory()->count(2), 'posts')->create();
//        \App\Models\Post::factory()->count(10)->create();
    }
}
