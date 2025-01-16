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
                'title' => 'Completed Projects',
                'icon' => 'df',
                'description' => 'Starlit has successfully completed 22 projects, providing premium real estate solutions in Bangladesh.',
                'slug' => 'completed-projects'
            ],
            [
                'title' => 'Ongoing Projects',
                'icon' => 'fh',
                'description' => 'Currently, Starlit is managing 12 ongoing projects, ensuring quality and timely delivery.',
                'slug' => 'ongoing-projects'
            ],
            [
                'title' => 'Happy Customers',
                'icon' => 'dg',
                'description' => 'Starlit is proud to have served 166 happy customers, creating dream homes and offices.',
                'slug' => 'happy-customers'
            ],
            [
                'title' => 'Years of Experience',
                'icon' => 'sf',
                'description' => 'With 17 years of experience, Starlit is a trusted name in the Bangladeshi real estate sector.',
                'slug' => 'years-of-experience'
            ]
        ];

        foreach ($data as $item) {
            AboutUsPoints::create($item);
        }
    }
}
