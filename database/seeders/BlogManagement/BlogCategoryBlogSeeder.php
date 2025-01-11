<?php

namespace Database\Seeders\BlogManagement;

use App\Models\BlogManagement\BlogCategoryBlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategoryBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'blog_id' => 1,  
                'blog_category_id' => 1, 
                'creator' => '1',
                'slug' => Str::slug('Blog 1 in Category 1'), 
                'status' => 1,
            ],
            [
                'blog_id' => 2, 
                'blog_category_id' => 2,
                'creator' => '1',
                'slug' => Str::slug('Blog 2 in Category 2'), 
                'status' => 1,
            ],
            [
                'blog_id' => 3, 
                'blog_category_id' => 3, 
                'creator' => '1',
                'slug' => Str::slug('Blog 3 in Category 3'), 
                'status' => 1,
            ],
        ];
        foreach ($data as $item) {
            BlogCategoryBlog::create($item);
        }
    }
}
