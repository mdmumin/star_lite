<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyGalleries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyGalleriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'property_id' => 101,
                'title' => 'Living Room View',
                'description' => 'A stunning view of the living room with modern furniture.',
                'image' => 'living_room.jpg',
                'is_featured' => true,
                'creator' => '1',
                'slug' => Str::slug('living-room-view'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'property_id' => 102,
                'title' => 'Garden Area',
                'description' => 'Beautifully landscaped garden with seating arrangements.',
                'image' => 'garden_area.jpg',
                'is_featured' => false,
                'creator' => '1',
                'slug' => Str::slug('garden-area'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'property_id' => 103,
                'title' => 'Bedroom Interior',
                'description' => 'A cozy bedroom with minimalist decor and natural lighting.',
                'image' => 'bedroom_interior.jpg',
                'is_featured' => true,
                'creator' => '1',
                'slug' => Str::slug('bedroom-interior'),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($data as $item) {
            PropertyGalleries::create($item);
        }
    }
}
