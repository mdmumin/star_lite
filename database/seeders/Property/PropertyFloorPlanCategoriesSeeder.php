<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyFloorPlanCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyFloorPlanCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'property_id' => 1,
                'title' => 'Residential Apartments',
                'creator' => '1',
                'slug' => Str::slug('residential-apartments'),
                'status' => 1,
            ],

            [
                'property_id' => 2,
                'title' => 'Luxury Villas',
                'creator' => '1',
                'slug' => Str::slug('luxury-villas'),
                'status' => 1,
            ],

            [
                'property_id' => 3,
                'title' => 'Commercial Spaces',
                'creator' => '1',
                'slug' => Str::slug('commercial-spaces'),
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            PropertyFloorPlanCategories::create($item);
        }
    }
}
