<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::all();

        $foods = \App\Models\Food::inRandomOrder()->take(6)->get(); // Mengambil 6 makanan secara acak

        $interval = 5; // Durasi waktu antar entri (dalam detik)
        $currentTime = Carbon::now();

        foreach ($categories as $category) {
            foreach ($foods as $food) {
                $category->foods()->attach($food->id, [
                    'created_at' => $currentTime,
                    'updated_at' => $currentTime,
                ]);

                $currentTime = $currentTime->addSeconds($interval);
            }
        }

        // $foods = \App\Models\Food::all();
        // $categories = \App\Models\Category::all();

        // foreach ($categories as $category) {
        //     $category->foods()->attach($foods->pluck('id'));
        // }
    }
}