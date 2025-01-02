<?php

namespace Database\Seeders\Management;

use App\Models\Management\OurGoal;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'title' => 'Our Main Goal',
                'icon' => '#',
                'sub_title' => 'Buy a home',
                'short_description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home. stakes and our valued customers with strong commitment to trustworthiness, quality and transparency in all our business endeavors. Starlit uses quality building materials and finishing products to ensure durability and customer satisfaction. We emphasize on attractive locations along with aesthetic design and sound construction maintaining rational values & standards.over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'slug' => 'Our Main Goal_11',
                'creator' => 1,
                'status' => 1,
                'created_at' => Carbon::now()
            ],

            [
                'title' => 'Our Main Goal',
                'icon' => '#',
                'sub_title' => 'Rent a home',
                'short_description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home. stakes and our valued customers with strong commitment to trustworthiness, quality and transparency in all our business endeavors. Starlit uses quality building materials and finishing products to ensure durability and customer satisfaction. We emphasize on attractive locations along with aesthetic design and sound construction maintaining rational values & standards.over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'slug' => 'Our Main Goal_10',
                'creator' => 2,
                'status' => 0,
                'created_at' => Carbon::now()
            ],

            [
                'title' => 'Sell a home',
                'icon' => '#',
                'sub_title' => 'Rent a home',
                'short_description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home. stakes and our valued customers with strong commitment to trustworthiness, quality and transparency in all our business endeavors. Starlit uses quality building materials and finishing products to ensure durability and customer satisfaction. We emphasize on attractive locations along with aesthetic design and sound construction maintaining rational values & standards.over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'slug' => 'Our Main Goal_12',
                'creator' => 2,
                'status' => 0,
                'created_at' => Carbon::now()
            ],

        ];

        foreach ($data as $item) {
            OurGoal::create($item);
        }
    }
}
