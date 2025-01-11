<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyKeyFeatures;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyKeyFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'property_id' => 1,
                'title' => 'Luxury Amenities',
                'short_description' => 'Includes modern features like a pool, gym, and spa.',
                'type' => 'key_value',
                'creator' => '1',
                'slug' => Str::slug('luxury-amenities'),
                'status' => 1,
            ],
            [
                'property_id' => 2,
                'title' => 'Prime Location',
                'short_description' => 'Located in the heart of downtown with easy access to major facilities.',
                'type' => 'points',
                'creator' => '1',
                'slug' => Str::slug('prime-location'),
                'status' => 1,
            ],
            [
                'property_id' => 3,
                'title' => 'Eco-Friendly Design',
                'short_description' => 'Built with sustainable materials and energy-efficient systems.',
                'type' => 'key_value',
                'creator' => '1',
                'slug' => Str::slug('eco-friendly-design'),
                'status' => 1,
            ],
        ];
        foreach ($data as $item) {
            PropertyKeyFeatures::create($item);
        }
    }
}
