<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil beberapa makanan dan kategori (misalnya, 3 makanan dan 2 kategori)
        // $foods = \App\Models\Food::inRandomOrder()->limit(3)->get();
        // $categories = \App\Models\Category::inRandomOrder()->limit(3)->get();

        // Melakukan pengaitan many-to-many antara makanan dan kategori
        // foreach ($foods as $food) {
        //     $food->categories()->attach($categories->pluck('id'));
        // }

        $foods = \App\Models\Food::all();
        $categories = \App\Models\Category::all();

        foreach ($categories as $category) {
            $category->foods()->attach($foods->pluck('id'));
        }
    }
}