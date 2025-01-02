<?php

namespace Database\Seeders\Management;

use App\Models\Management\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'title' => 'Looking for a dream home?',
                'short_description' => 'We can help you realize your dream of a new home.',
                'description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home. stakes and our valued customers with strong commitment to trustworthiness, quality and transparency in all our business endeavors. Starlit uses quality building materials and finishing products to ensure durability and customer satisfaction. We emphasize on attractive locations along with aesthetic design and sound construction maintaining rational values & standards.over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'slug' => 'Our Main Goal_11',
                'creator' => 1,
                'status' => 1,
            ],

            [
                'title' => 'Looking for a dream home?',
                'short_description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home. stakes and our valued customers with strong commitment to trustworthiness, quality and transparency in all our business endeavors. Starlit uses quality building materials and finishing products to ensure durability and customer satisfaction. We emphasize on attractive locations along with aesthetic design and sound construction maintaining rational values & standards.over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'slug' => 'Our Main Goal_10',
                'creator' => 2,
                'status' => 0,
            ],

            [
                'title' => 'Looking for a dream home?',
                'short_description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'description' => 'over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home. stakes and our valued customers with strong commitment to trustworthiness, quality and transparency in all our business endeavors. Starlit uses quality building materials and finishing products to ensure durability and customer satisfaction. We emphasize on attractive locations along with aesthetic design and sound construction maintaining rational values & standards.over 1 million+ homes for sale available on the website, we can match you with a house you will want to call home.',
                'slug' => 'Our Main Goal_12',
                'creator' => 2,
                'status' => 0,
            ],

        ];
        foreach($data as $item){
            Faq::create($item);
        }
    }
}
