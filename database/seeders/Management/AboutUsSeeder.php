<?php

namespace Database\Seeders\Management;

use App\Models\Management\AboutUs;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('about_us')->truncate();
        $data = [
            [
                'title' => 'About Us 1',
                'sub_title' => 'Subtitle 1',
                'short_description' => 'Short description for About Us 1.',
                'description' => 'Long description for About Us 1.',
                'image' => 'about_us_1.jpg',
                'video_thumbnail_image' => 'video_thumbnail_1.jpg',
                'video_url' => '#',
                'quote_text' => 'This is a quote for About Us 1.',
                'button_text' => 'Learn More',
                'button_url' => '#',
                'slug' => 'about-us-title-1',
                'creator' => 1,
                'status' => 1,
            ],
            [
                'title' => 'About Us 2',
                'sub_title' => 'Subtitle 2',
                'short_description' => 'Short description for About Us 2.',
                'description' => 'Long description for About Us 2.',
                'image' => 'about_us_2.jpg',
                'video_thumbnail_image' => 'video_thumbnail_2.jpg',
                'video_url' => '#',
                'quote_text' => 'This is a quote for About Us 2.',
                'button_text' => 'Learn More',
                'button_url' => '#',
                'slug' => 'about-us-title-2',
                'creator' => 1,
                'status' => 1,
            ],
            [
                'title' => 'About Us 3',
                'sub_title' => 'Subtitle 3',
                'short_description' => 'Short description for About Us 3.',
                'description' => 'Long description for About Us 3.',
                'image' => 'about_us_3.jpg',
                'video_thumbnail_image' => 'video_thumbnail_3.jpg',
                'video_url' => '#',
                'quote_text' => 'This is a quote for About Us 3.',
                'button_text' => 'Learn More',
                'button_url' => '#',
                'slug' => 'about-us-title-3',
                'creator' => 1,
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            AboutUs::create($item);
        }
    }
}