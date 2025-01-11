<?php

namespace Database\Seeders\BlogManagement;

use App\Models\BlogManagement\BlogTagBlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogTagBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'blog_id' => 1, 
                'blog_tag_id' => 1,
                'creator' => '1',
                'slug' => Str::slug('Blog 1 with Tag 1'), 
                'status' => 1,
            ],
            [
                'blog_id' => 2, 
                'blog_tag_id' => 2, 
                'creator' => '1',
                'slug' => Str::slug('Blog 2 with Tag 2'), 
                'status' => 1,
            ],
            [
                'blog_id' => 3, 
                'blog_tag_id' => 3,
                'creator' => '1',
                'slug' => Str::slug('Blog 3 with Tag 3'), 
                'status' => 1,
            ],
        ];
        foreach ($data as $item) {
            BlogTagBlog::create($item);
        }
    }
}
