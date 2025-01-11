<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyFloorPlanKeyValues;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyFloorPlanKeyValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'property_id' => 1,
                'property_floor_plan_category_id' => 1,
                'title' => 'Total Area',
                'value' => '2500 sq ft',
                'type' => 'string',
                'creator' => '1',
                'slug' => Str::slug('total-area'),
                'status' => 1,
            ],
            [
                'property_id' => 2,
                'property_floor_plan_category_id' => 2,
                'title' => 'Bedroom Dimensions',
                'value' => '15x20 ft',
                'type' => 'string',
                'creator' => '1',
                'slug' => Str::slug('bedroom-dimensions'),
                'status' => 1,
            ],
            [
                'property_id' => 3,
                'property_floor_plan_category_id' => 3,
                'title' => 'Flooring Type',
                'value' => 'Italian Marble',
                'type' => 'text',
                'creator' => '1',
                'slug' => Str::slug('flooring-type'),
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            PropertyFloorPlanKeyValues::create($item);
        }
    }
}
