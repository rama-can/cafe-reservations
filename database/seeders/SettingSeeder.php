<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'site_name',
                'value' => 'The 60s Cafe',
            ],
            [
                'key' => 'site_description',
                'value' => 'The PHP Framework for Web Artisans',
            ],
            [
                'key' => 'facebook',
                'value' => 'https://facebook.com',
            ],
            [
                'key' => 'twitter',
                'value' => 'https://twitter.com',
            ],
            [
                'key' => 'instagram',
                'value' => 'https://instagram.com',
            ],
            [
                'key' => 'email',
                'value' => 'example@gamil.com',
            ],
            [
                'key' => 'copyright',
                'value' => 'Rama Can & Fahmi Tri septiyadi',
            ],
            [
                'key' => 'logo',
                'value' => 'images/logo.png',
            ],
            [
                'key' => 'banner_1',
                'value' => 'images/slide-01.jpg',
            ],
            [
                'key' => 'banner_2',
                'value' => 'images/slide-02.jpg',
            ],
            [
                'key' => 'banner_3',
                'value' => 'images/slide-03.jpg',
            ]
        ];

        foreach ($data as $setting) {
            \App\Models\Setting::create($setting);
        }
    }
}