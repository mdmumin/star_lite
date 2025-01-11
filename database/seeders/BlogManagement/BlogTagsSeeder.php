<?php

namespace Database\Seeders\BlogManagement;

use App\Models\BlogManagement\BlogTags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Real Estate',
                'creator' => '1',
                'slug' => Str::slug('Real'),
                'status' => 1,
            ],
            [
                'title' => 'Investment Tips',
                'creator' => '1',
                'slug' => Str::slug('Investment'),
                'status' => 1,
            ],
            [
                'title' => 'Market Trends',
                'creator' => '1',
                'slug' => Str::slug('Market'),
                'status' => 1,
            ],
        ];
        foreach ($data as $item) {
            BlogTags::create($item);
        }
    }
}
