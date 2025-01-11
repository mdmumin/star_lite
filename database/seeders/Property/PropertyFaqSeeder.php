<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyFaqs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'property_id' => 1,
                'title' => 'What is the property size?',
                'description' => 'The property spans across 2000 sq. ft.',
                'creator' => '1',
                'slug' => Str::slug('what-is-the-property-size'),
                'status' => 1,
            ],
            [
                'property_id' => 2,
                'title' => 'Is parking available?',
                'description' => 'Yes, the property includes dedicated parking spaces.',
                'creator' => '1',
                'slug' => Str::slug('is-parking-available'),
                'status' => 1,
            ],
            [
                'property_id' => 3,
                'title' => 'Are pets allowed?',
                'description' => 'Yes, pets are allowed in this property.',
                'creator' => '1',
                'slug' => Str::slug('are-pets-allowed'),
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            PropertyFaqs::create($item);
        }
    }
}
