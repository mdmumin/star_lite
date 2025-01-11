<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyComments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyCommentSeeder extends Seeder
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
                'comment' => 'This is a great property with a fantastic view.',
                'parent_id' => null,
                'creator' => '1',
                'slug' => Str::slug('Great property view'),
                'status' => 1,
            ],
            [
                'user_id' => 2,
                'property_id' =>2,
                'comment' => 'Loved the amenities provided here.',
                'parent_id' => null,
                'creator' => '1',
                'slug' => Str::slug('Amenities loved'),
                'status' => 1,
            ],
            [
                'user_id' => 3,
                'property_id' => 3,
                'comment' => 'The property is located in a prime area.',
                'parent_id' => null,
                'creator' => '1',
                'slug' => Str::slug('Prime area property'),
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            PropertyComments::create($item);
        }
    }
}
