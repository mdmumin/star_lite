<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Residential Properties',
                'cover_image' => 'residential_properties.jpg',
                'creator' => 'Admin',
                'slug' => Str::slug('Residential Properties'),
                'status' => 1,
                
            ],
            [
                'title' => 'Commercial Properties',
                'cover_image' => 'commercial_properties.jpg',
                'creator' => 'Admin',
                'slug' => Str::slug('Commercial Properties'),
                'status' => 1,
                
            ],
            [
                'title' => 'Eco-friendly Properties',
                'cover_image' => 'eco_friendly_properties.jpg',
                'creator' => 'Admin',
                'slug' => Str::slug('Eco-friendly Properties'),
                'status' => 1,
                
            ],
        ];

        foreach ($data as $item) {
        PropertyCategories::create($item);            
        }
    }
}
