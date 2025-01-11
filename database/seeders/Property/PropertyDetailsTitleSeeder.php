<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyDetailsTitles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyDetailsTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'property_id' => 1,
                'title' => 'Spacious 3-Bedroom Apartment',
                'creator' => '1',
                'slug' => Str::slug('spacious-3-bedroom-apartment'),
                'status' => 1,
                
            ],
            [
                'property_id' => 2,
                'title' => 'Luxury Villa with Ocean View',
                'creator' => '1',
                'slug' => Str::slug('luxury-villa-with-ocean-view'),
                'status' => 1,
                
            ],
            [
                'property_id' => 3,
                'title' => 'Modern Studio in Downtown',
                'creator' => '1',
                'slug' => Str::slug('modern-studio-in-downtown'),
                'status' => 1,
                
            ],
        ];

        foreach ($data as $item) {
            PropertyDetailsTitles::create($item);
        }
    }
}
