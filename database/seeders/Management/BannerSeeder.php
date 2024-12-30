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
        Banner::create([
            'title' => 'Find Your Dream House By Us',
            'sub_title' => 'Real Estate Agency',
            'sort_descripton' => 'This video covers the basics of setting up a starlite project.',
            'button_text' => '/contact',
            'button_url' => '#',
            'creator' => '0',
            'slug' => 'super_admin',
            'status' => 1,
     ]);
    }
}
