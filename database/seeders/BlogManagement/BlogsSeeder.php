<?php

namespace Database\Seeders\BlogManagement;

use App\Models\BlogManagement\Blogs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Finding Your Dream Home in Dhaka',
                'creator' => '1',
                'short_description' => 'Tips on buying the perfect home in Dhaka.',
                'full_description' => 'Dhaka, the capital of Bangladesh, is home to a variety of properties. Whether you are looking for apartments, houses, or commercial spaces, this guide helps you find your dream home.',
                'cover_image' => 'path/to/cover_image1.jpg',
                'is_published' => true,
                'publish_date' => now(),
                'slug' => Str::slug('finding-your-dream-home-in-dhaka'),
                'seo_title' => 'Dream Home in Dhaka - Starlite Real Estate',
                'seo_keyword' => 'Dhaka, Dream Home, Real Estate, Bangladesh',
                'seo_description' => 'A comprehensive guide to finding your dream home in Dhaka with Starlite Real Estate.',
                'status' => 1
            ],
            [
                'title' => 'Investing in Real Estate in Bangladesh',
                'creator' => '1',
                'short_description' => 'Why Bangladesh is becoming a top destination for real estate investors.',
                'full_description' => 'Bangladesh has seen rapid growth in its real estate market. With infrastructure development, a growing economy, and increasing demand for homes and businesses, investing in Bangladesh’s real estate is an attractive option.',
                'cover_image' => 'path/to/cover_image2.jpg',
                'is_published' => true,
                'publish_date' => now(),
                'slug' => Str::slug('investing-in-real-estate-in-bangladesh'),
                'seo_title' => 'Investing in Bangladesh Real Estate - Starlite',
                'seo_keyword' => 'Bangladesh, Real Estate Investment, Property',
                'seo_description' => 'Explore why investing in real estate in Bangladesh is a profitable opportunity with Starlite Real Estate.',
                'status' => 1
            ],
            [
                'title' => 'Top Luxury Properties for Sale in Bangladesh',
                'creator' => '1',
                'short_description' => 'Discover high-end properties across Bangladesh.',
                'full_description' => 'If you are looking for luxury properties in Bangladesh, Starlite Real Estate offers exclusive listings in prime locations such as Dhaka, Chittagong, and Sylhet. Explore our top luxury offerings and find your perfect home.',
                'cover_image' => 'path/to/cover_image3.jpg',
                'is_published' => true,
                'publish_date' => now(),
                'slug' => Str::slug('top-luxury-properties-for-sale-in-bangladesh'),
                'seo_title' => 'Luxury Properties for Sale in Bangladesh - Starlite Real Estate',
                'seo_keyword' => 'Luxury Properties, Bangladesh Real Estate, Premium Homes',
                'seo_description' => 'Find the best luxury properties for sale across Bangladesh with Starlite Real Estate.',
                'status' => 1
            ]
        ];

        foreach ($data as $item) {
            Blogs::create($item);
        }
    }
}
