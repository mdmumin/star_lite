<?php

namespace Database\Seeders;

use App\Models\Management\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'video_url' => 'x9gIy59kWw0',
                'button_title' => '/contact',
                'button_url' => '#',
                'creator' => '0',
                'slug' => 'super_admin',
                'status' => 1,
            
         ]);
    }
}
