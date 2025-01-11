<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyFloorPlanCategoryContents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyFloorPlanCategoryContentSeeder extends Seeder
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
                'title' => 'Modern Apartment Floor Plan',
                'description' => 'A detailed layout of the modern apartment including bedroom, kitchen, and living room.',
                'thumb_image' => 'modern_apartment_thumb.jpg',
                'additional_images' => json_encode(['image1.jpg', 'image2.jpg', 'image3.jpg']),
                'creator' => '1',
                'slug' => Str::slug('modern-apartment-floor-plan'),
                'status' => 1,
            ],

            [
                'property_id' => 2,
                'property_floor_plan_category_id' => 2,
                'title' => 'Luxury Villa Floor Plan',
                'description' => 'A luxurious villa layout featuring multiple bedrooms, a swimming pool, and a large garden.',
                'thumb_image' => 'luxury_villa_thumb.jpg',
                'additional_images' => json_encode(['villa1.jpg', 'villa2.jpg', 'villa3.jpg']),
                'creator' => '1',
                'slug' => Str::slug('luxury-villa-floor-plan'),
                'status' => 1,
            ],

            [
                'property_id' => 3,
                'property_floor_plan_category_id' => 3,
                'title' => 'Studio Apartment Floor Plan',
                'description' => 'Compact studio apartment layout with an efficient use of space for urban living.',
                'thumb_image' => 'studio_apartment_thumb.jpg',
                'additional_images' => json_encode(['studio1.jpg', 'studio2.jpg']),
                'creator' => '1',
                'slug' => Str::slug('studio-apartment-floor-plan'),
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            PropertyFloorPlanCategoryContents::create($item);
        }
    }
}
