<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

      
        $this->call(UserSeeder::class);
        \App\Models\User::factory(20)->create();
        \App\Models\Post::factory(20)->create();
        \App\Models\Crud::factory(20)->create();
        \App\Models\Contact::factory(20)->create();
        \App\Models\Category::factory(20)->create();
    }
}
