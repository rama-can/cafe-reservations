<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            [
                'name' => 'Eggs Omelette',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'price' => 10000,
                'is_available' => true,
                'image' => 'images/tab-item-04.png',
            ],
            [
                'name' => 'Fresh Chicken Salad',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'price' => 35000,
                'is_available' => true,
                'image' => 'images/tab-item-01.png',
            ],
            [
                'name' => 'Orange Juice',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'price' => 15000,
                'is_available' => true,
                'image' => 'images/tab-item-02.png',
            ],
            [
                'name' => 'Fruit Salad',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'price' => 45000,
                'is_available' => true,
                'image' => 'images/tab-item-03.png',
            ],
            [
                'name' => 'Omelette & Cheese',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'price' => 45000,
                'is_available' => true,
                'image' => 'images/tab-item-06.png',
            ],
            [
                'name' => 'Eggs Omelette',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'price' => 20000,
                'is_available' => true,
                'image' => 'images/tab-item-05.png',
            ],
        ];

        foreach ($foods as $food) {
            \App\Models\Food::create($food);
        }
    }
}