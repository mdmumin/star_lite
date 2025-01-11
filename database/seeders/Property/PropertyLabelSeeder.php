<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyLabels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'New',
                'creator' => '1',
                'slug' => Str::slug('New'),
                'status' => 1,
            ],
            [
                'title' => 'Featured',
                'creator' => '1',
                'slug' => Str::slug('Featured'),
                'status' => 1,
            ],
            [
                'title' => 'Hot',
                'creator' => '1',
                'slug' => Str::slug('Hot'),
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            PropertyLabels::create($item);
        }
    }
}
