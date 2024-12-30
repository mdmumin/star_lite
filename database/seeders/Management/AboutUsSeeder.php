<?php

namespace Database\Seeders\Management;

use App\Models\Management\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create([

            [
            'title' => 'About Us',
            'sub_title' => 'Subtitle',
            'short_description' => 'Expertise in all areas of a real estate venture is what Starlit Homes Ltd can take a pride on. It’s a pleasant journey along with our revered',
            'description' => 'Expertise in all areas of a real estate venture is what Starlit Homes Ltd can take a pride on. It’s a pleasant journey along with our revered stakes and our valued customers with strong commitment to trustworthiness, quality and transparency in all our business endeavors. Starlit uses quality building materials and finishing products to ensure durability and customer satisfaction. We emphasize on attractive locations along with aesthetic design and sound construction maintaining rational values & standards.',
            'image' => 'about_us_1.jpg',
            'video_thumbnail_image' => 'video_thumbnail_1.jpg',
            'video_url' => '#',
            'quote_text' => 'This is a quote for About Us .',
            'button_text' => 'Learn More',
            'button_url' => '#',
            'slug' => 'about-us-title',
            'creator' => 1,
            'status' => 1,
            ],

            [
                'title' => 'About Us 2',
                'sub_title' => 'Subtitle',
                'short_description' => 'Expertise in all areas of a real estate venture is what Starlit Homes Ltd can take a pride on. It’s a pleasant journey along with our revered',
                'description' => 'Expertise in all areas of a real estate venture is what Starlit Homes Ltd can take a pride on. It’s a pleasant journey along with our revered stakes and our valued customers with strong commitment to trustworthiness, quality and transparency in all our business endeavors. Starlit uses quality building materials and finishing products to ensure durability and customer satisfaction. We emphasize on attractive locations along with aesthetic design and sound construction maintaining rational values & standards.',
                'image' => 'about_us_1.jpg',
                'video_thumbnail_image' => 'video_thumbnail_1.jpg',
                'video_url' => '#',
                'quote_text' => 'This is a quote for About Us .',
                'button_text' => 'Learn More',
                'button_url' => '#',
                'slug' => 'about-us-title',
                'creator' => 2,
                'status' => 0,
                ],
            
     ]);
    }
}
