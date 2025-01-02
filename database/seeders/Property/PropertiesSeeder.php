<?php

namespace Database\Seeders\Property;

use App\Models\Property\Properties;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Luxury Villas in Starlite Heights',
                'creator' => 'Admin',
                'short_description' => 'Exclusive villas with stunning views of the city.',
                'full_description' => 'Discover the epitome of luxury living in Starlite Heights. These villas feature modern architecture, spacious layouts, and top-notch amenities for an unparalleled lifestyle.',
                'cover_image' => 'luxury_villas.jpg',
                'is_published' => true,
                'publish_date' => now(),
                'slug' => Str::slug('Luxury Villas in Starlite Heights'),
                'seo_title' => 'Luxury Villas in Starlite Heights',
                'seo_keyword' => 'Luxury Villas, Starlite Heights, Real Estate',
                'seo_description' => 'Explore luxury villas in Starlite Heights. Perfect for families seeking a premium lifestyle.',
                'is_closed' => false,
                'total_plot' => 30,
                'total_flat' => null,
                'total_plot_sold' => 12,
                'total_flat_sold' => null,
                'available_text' => '18 plots available',
                'status' => '1',
            ],

            [
                'title' => 'Starlite City Apartments',
                'creator' => 'Admin',
                'short_description' => 'Affordable and modern apartments in the heart of the city.',
                'full_description' => 'Starlite City Apartments offer modern living spaces for young professionals and families. Located in the city center, these apartments are close to all essential services and entertainment hubs.',
                'cover_image' => 'city_apartments.jpg',
                'is_published' => true,
                'publish_date' => now(),
                'slug' => Str::slug('Starlite City Apartments'),
                'seo_title' => 'Starlite City Apartments - Affordable Modern Living',
                'seo_keyword' => 'Starlite Apartments, Affordable Flats, City Living',
                'seo_description' => 'Affordable and modern apartments in Starlite City. Perfect for families and young professionals.',
                'is_closed' => false,
                'total_plot' => null,
                'total_flat' => 50,
                'total_plot_sold' => null,
                'total_flat_sold' => 20,
                'available_text' => '30 flats available',
                'status' => '1',
            ],

            [
                'title' => 'Eco-friendly Housing in Starlite Green',
                'creator' => 'Admin',
                'short_description' => 'Sustainable and eco-friendly homes with beautiful landscapes.',
                'full_description' => 'Starlite Green offers a perfect blend of modern architecture and sustainability. These eco-friendly homes are designed with green technologies and offer a peaceful living environment.',
                'cover_image' => 'eco_housing.jpg',
                'is_published' => true,
                'publish_date' => now(),
                'slug' => Str::slug('Eco-friendly Housing in Starlite Green'),
                'seo_title' => 'Eco-friendly Housing in Starlite Green',
                'seo_keyword' => 'Eco-friendly Homes, Starlite Green, Sustainable Living',
                'seo_description' => 'Sustainable and eco-friendly housing options in Starlite Green with modern amenities.',
                'is_closed' => false,
                'total_plot' => 20,
                'total_flat' => 10,
                'total_plot_sold' => 5,
                'total_flat_sold' => 2,
                'available_text' => '15 plots and 8 flats available',
                'status' => '1',
            ],
        ];

        foreach ($data as $item) { 
            Properties::create($item);
         }
    }
}
