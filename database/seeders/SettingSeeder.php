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
                'key' => 'address',
                'value' => 'Jl. Raya Cikaret No. 1, Cikaret, Kec. Cikarang Sel., Bekasi, Jawa Barat 17530',
            ],
            [
                'key' => 'about-us',
                'value' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.',
            ],
            [
                'key' => 'logo',
                'value' => 'storage/images/logo.png',
            ],
            [
                'key' => 'banner_1',
                'value' => 'storage/images/slide-01.jpg',
            ],
            [
                'key' => 'banner_2',
                'value' => 'storage/images/slide-02.jpg',
            ],
            [
                'key' => 'banner_3',
                'value' => 'storage/images/slide-03.jpg',
            ]
        ];

        foreach ($data as $setting) {
            \App\Models\Setting::create($setting);
        }
    }
}