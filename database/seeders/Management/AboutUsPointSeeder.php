<?php

namespace Database\Seeders\Management;

use App\Models\Management\AboutUsPoints;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us_points')->truncate();
        $data = [
            [
                'title' => 'Complete Project',
                'icon' => 'df',
                'amount' => '22',
                'slug' => 'about-use6uy',
                'creator' => 1,
                'status' => 1,
            ],

            [
                'title' => 'Project Ongoing',
                'icon' => 'fh',
                'amount' => '12',
                'slug' => 'about-us-titlerrt',
                'creator' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Happy customers',
                'icon' => 'dg',
                'amount' => '166',
                'slug' => 'about-us-titlkk',
                'creator' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Years of experience',
                'icon' => 'sf',
                'amount' => '17',
                'slug' => 'about-us-titlehgh',
                'creator' => 1,
                'status' => 1,
            ],
            
        ];

        foreach($data as $item){
            AboutUsPoints::create($item);
        }
    }
}
