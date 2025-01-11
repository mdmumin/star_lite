<?php

namespace Database\Seeders\BlogManagement;

use App\Models\BlogManagement\BlogCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Real Estate Tips',
                'image' => 'path/to/category_image1.jpg',
                'creator' => '1',
                'slug' => Str::slug('Real Estate Tips'),
                'status' => 1,
            ],
            [
                'title' => 'Property Listings',
                'image' => 'path/to/category_image2.jpg',
                'creator' => '1',
                'slug' => Str::slug('Real Estate Tips'),
                'status' => 1,
            ],
            [
                'title' => 'Investment Opportunities',
                'image' => 'path/to/category_image3.jpg',
                'creator' => '1',
                'slug' => Str::slug('Real Estate Tips'),
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            BlogCategories::create($item);
        }
    }
}
