<?php

namespace Database\Seeders\BlogManagement;

use App\Models\BlogManagement\BlogLikes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'blog_id' => 1,
                'date' => '2025-01-01',
                'creator' => '1',
                'slug' => Str::slug('property-1-like'),
                'status' => 1,
            ],
            [
                'user_id' => 2,
                'blog_id' => 2,
                'date' => '2025-01-02',
                'creator' => '2',
                'slug' => Str::slug('property-2-like'),
                'status' => 1,
            ],
            [
                'user_id' => 3,
                'blog_id' => 3,
                'date' => '2025-01-03',
                'creator' => '1',
                'slug' => Str::slug('property-3-like'),
                'status' => 1,
            ],
        ];
        foreach ($data as $item) {
            BlogLikes::create($item);
        }
    }
}
