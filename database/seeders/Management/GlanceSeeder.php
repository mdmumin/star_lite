<?php

namespace Database\Seeders\Management;

use App\Models\Management\Glance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Glance::create([
            [
                'title' => 'Complete Project',
                'icon' => '#',
                'amount' => '22',
                'slug' => 'about-us-title',
                'creator' => 1,
                'status' => 1,
            ],

            [
                'title' => 'Project Ongoing',
                'icon' => '#',
                'amount' => '12',
                'slug' => 'about-us-title',
                'creator' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Happy customers',
                'icon' => '#',
                'amount' => '166',
                'slug' => 'about-us-title',
                'creator' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Years of experience',
                'icon' => '#',
                'amount' => '17',
                'slug' => 'about-us-title',
                'creator' => 1,
                'status' => 1,
            ],
            
     ]);
    }
}