<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'image' => 'images/tab-icon-01.png',
                'name' => 'Breakfast',
                'is_active' => true
            ],
            [
                'image' => 'images/tab-icon-02.png',
                'name' => 'Lunch',
                'is_active' => true
            ],
            [
                'image' => 'images/tab-icon-03.png',
                'name' => 'Dinner',
                'is_active' => true
            ]
        ];

        foreach ($category as $data) {
            \App\Models\Category::create($data);
        }
    }
}