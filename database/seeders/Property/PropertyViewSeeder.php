<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyViews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyViewSeeder extends Seeder
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
                'total_count' => 5,
                'ip' => '192.168.1.1',
                'creator' => '1',
                'slug' => Str::slug('property-1-views'),
                'status' => 1,
            ],
            [
                'user_id' => 2,
                'property_id' => 2,
                'date' => '2025-01-02',
                'total_count' => 10,
                'ip' => '192.168.1.2',
                'creator' => '1',
                'slug' => Str::slug('property-2-views'),
                'status' => 1,
            ],
            [
                'user_id' => null,
                'property_id' => 3,
                'date' => '2025-01-03',
                'total_count' => 15,
                'ip' => '192.168.1.3',
                'creator' => '2',
                'slug' => Str::slug('property-3-views'),
                'status' => 1,
            ],
        ];
        foreach ($data as $item) {
            PropertyViews::create($item);
        }
    }
}
