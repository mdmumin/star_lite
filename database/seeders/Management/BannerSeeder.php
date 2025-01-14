<?php

namespace Database\Seeders\Management;

use App\Models\Management\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
        [
            'title' => 'Find Your Dream House By Us',
            'sub_title' => 'Real Estate Agency',
            'short_descripton' => 'This video covers the basics of setting up a starlite project.',
            'button_text' => '/contact',
            'button_url' => '#',
            'creator' => '1',
            'slug' => 'super_admin',
            'status' => 1,
        ],
        [
            'title' => 'Explore Luxury Apartments',
            'sub_title' => 'Your Next Destination',
            'short_descripton' => 'Discover the finest living spaces with exclusive amenities.',
            'button_text' => '/luxury-apartments',
            'button_url' => '#luxury',
            'creator' => '1',
            'slug' => 'luxury_apartments',
            'status' => 1,
        ],
        [
            'title' => 'Modern Offices for Rent',
            'sub_title' => 'Workspaces That Inspire',
            'short_descripton' => 'Find the perfect office space for your team with Starlite.',
            'button_text' => '/offices',
            'button_url' => '#offices',
            'creator' => '1',
            'slug' => 'modern_offices',
            'status' => 1,
        ] 
     ];
     foreach ($data as $item) {
        Banner::create($item);
     }
    }
}
