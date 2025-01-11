<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyLabelProperty;
use App\Models\Property\PropertyLabels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyLabelPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'property_id' => 1,
                'property_label_id' => 1,
                
                'creator' => '1',
                'slug' => Str::slug('Great property view'),
                'status' => 1,
            ],
            [
                'property_id' =>2,
                'property_label_id' => 2,
               
                'creator' => '1',
                'slug' => Str::slug('Amenities loved'),
                'status' => 1,
            ],
            [
                'property_id' => 3,
                'property_label_id' => 3,
                'creator' => '1',
                'slug' => Str::slug('Prime area property'),
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            PropertyLabelProperty::create($item);
        }
    }
}
