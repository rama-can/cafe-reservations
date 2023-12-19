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

        \App\Models\User::factory()->create([
            'name' => 'Rama Can',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::factory(9)->create();
        $this->call([
            SettingSeeder::class,
            CategorySeeder::class,
            FoodSeeder::class,
            FoodCategorySeeder::class,
        ]);
        \App\Models\Reservation::factory(6)->create();
    }
}