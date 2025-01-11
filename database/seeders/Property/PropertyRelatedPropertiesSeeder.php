<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyRelatedProperties;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyRelatedPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'property_id' => 1,
                'related_property_id' => 2,
                'creator' => '1',
                'slug' => Str::slug('property-1-related-to-property-2'),
                'status' => 1,
                
            ],
            [
                'property_id' => 1,
                'related_property_id' => 3,
                'creator' => '1',
                'slug' => Str::slug('property-1-related-to-property-3'),
                'status' => 1,
                
            ],
            [
                'property_id' => 2,
                'related_property_id' => 3,
                'creator' => '1',
                'slug' => Str::slug('property-2-related-to-property-3'),
                'status' => 1,
                
            ],
        ];

        foreach ($data as $item) {
            PropertyRelatedProperties::create($item);
        }
    }
}
