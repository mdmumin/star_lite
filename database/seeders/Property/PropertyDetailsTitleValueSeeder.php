<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyDetailsTitleValues;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyDetailsTitleValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'property_id' => 1,
                'property_details_title_id' => 1,
                'value' => 'This 3-bedroom apartment offers a spacious layout, modern kitchen, and an open living area perfect for families.',
                'creator' => '1',
                'slug' => Str::slug('3-bedroom-apartment-details'),
                'status' => 1,
            ],
            [
                'property_id' => 2,
                'property_details_title_id' => 2,
                'value' => 'The villa includes 4 bedrooms, a private pool, and a large balcony with breathtaking ocean views.',
                'creator' => '1',
                'slug' => Str::slug('luxury-villa-details'),
                'status' => 1,
            ],
            [
                'property_id' => 3,
                'property_details_title_id' => 3,
                'value' => 'A modern studio located in the heart of downtown, featuring a sleek design and easy access to amenities.',
                'creator' => '1',
                'slug' => Str::slug('modern-studio-details'),
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            PropertyDetailsTitleValues::create($item);
        }
    }
}
