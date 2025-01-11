<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyTags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Luxury',
                'creator' => '1',
                'slug' => Str::slug('Luxury'),
                'status' => 1,
                
            ],
            [
                'title' => 'Affordable',
                'creator' => '1',
                'slug' => Str::slug('Affordable'),
                'status' => 1,
                
            ],
            [
                'title' => 'Eco-friendly',
                'creator' => '1',
                'slug' => Str::slug('Eco-friendly'),
                'status' => 1,
                
            ],
        ];

        foreach ($data as $item) {
            PropertyTags::create($item);
        }
    }
}
