<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyLikes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class PropertyLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'property_id' => 1,
                'date' => '2025-01-01',
                'creator' => '1',
                'slug' => Str::slug('property-1-like'),
                'status' => 1,
            ],
            [
                'user_id' => 2,
                'property_id' => 2,
                'date' => '2025-01-02',
                'creator' => '2',
                'slug' => Str::slug('property-2-like'),
                'status' => 1,
            ],
            [
                'user_id' => 3,
                'property_id' => 3,
                'date' => '2025-01-03',
                'creator' => '1',
                'slug' => Str::slug('property-3-like'),
                'status' => 1,
            ],
        ];
        foreach ($data as $item) {
            PropertyLikes::create($item);
        }
    }
}
