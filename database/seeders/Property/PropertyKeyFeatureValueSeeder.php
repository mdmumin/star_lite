<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyKeyFeatureValues;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyKeyFeatureValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'property_id' => 1,
                'property_key_feature_id' => 1,
                'icon' => 'icon-feature-1.png',
                'title' => 'Swimming Pool',
                'value' => 'Olympic-size pool with temperature control',
                'type' => 'string',
                'creator' => '1',
                'slug' => Str::slug('swimming-pool'),
                'status' => 1,
            ],
            [
                'property_id' => 2,
                'property_key_feature_id' => 2,
                'icon' => 'icon-feature-2.png',
                'title' => 'Gym',
                'value' => 'Fully equipped gym with modern machines',
                'type' => 'text',
                'creator' => '1',
                'slug' => Str::slug('gym'),
                'status' => 1,
            ],
            [
                'property_id' => 3,
                'property_key_feature_id' => 3,
                'icon' => 'icon-feature-3.png',
                'title' => 'Parking',
                'value' => 'Underground parking for up to 500 vehicles',
                'type' => 'string',
                'creator' => '1',
                'slug' => Str::slug('parking'),
                'status' => 1,
            ],
        ];
        foreach ($data as $item) {
            PropertyKeyFeatureValues::create($item);
        }
    }
}
