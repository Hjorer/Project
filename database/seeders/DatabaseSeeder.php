<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
           $categories = \App\Models\Categories::factory(5)->create();
        \App\Models\Categories::factory(10)->create();
         \App\Models\Products::factory(20)->recycle($categories)->create();
        \App\Models\userstask4::factory(10)->create();
        \App\Models\productstask4::factory(10)->create();
        \App\Models\articlesstask4::factory(10)->create();
    }
}
