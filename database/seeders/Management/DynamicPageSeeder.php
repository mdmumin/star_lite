<?php

namespace Database\Seeders\Management;

use App\Models\Management\DynamicPage;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DynamicPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'parent_id' => 0,
                'title' => 'About Us',
                'page_url' => 'about-us',
                'subtitle' => 'Learn more about our company',
                'description' => 'This is the description for the About Us page.',
                'image' => 'about-us.jpg',
                'meta_title' => 'About Us - Company',
                'meta_description' => 'Meta description for the About Us page.',
                'meta_keywords' => 'about us, company, meta keywords',
                'meta_image' => 'meta-about-us.jpg',
                'page_css' => 'body { background-color: #f4f4f4; }',
                'page_script' => 'console.log("About Us Page Loaded");',
                'slug' => 'about-us-title',
                'creator' => 1,
                'status' => 1,
                'created_at' => Carbon::now()  
            ],
            [
                'parent_id' => 0,
                'title' => 'Services',
                'page_url' => 'services',
                'subtitle' => 'Explore our services',
                'description' => 'This is the description for the Services page.',
                'image' => 'services.jpg',
                'meta_title' => 'Services - Company',
                'meta_description' => 'Meta description for the Services page.',
                'meta_keywords' => 'services, offerings, meta keywords',
                'meta_image' => 'meta-services.jpg',
                'page_css' => 'body { background-color: #ffffff; }',
                'page_script' => 'console.log("Services Page Loaded");',
                'slug' => 'about-us-title',
                'creator' => 1,
                'status' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'parent_id' => 0,
                'title' => 'Contact Us',
                'page_url' => 'contact-us',
                'subtitle' => 'Get in touch with us',
                'description' => 'This is the description for the Contact Us page.',
                'image' => 'contact-us.jpg',
                'meta_title' => 'Contact Us - Company',
                'meta_description' => 'Meta description for the Contact Us page.',
                'meta_keywords' => 'contact, reach out, meta keywords',
                'meta_image' => 'meta-contact-us.jpg',
                'page_css' => 'body { background-color: #e9ecef; }',
                'page_script' => 'console.log("Contact Us Page Loaded");',
                'slug' => 'about-us-title',
                'creator' => 1,
                'status' => 1,
                'created_at' => Carbon::now()
            ],
        ];
        foreach($data as $item){
            DynamicPage::create($item);
        }
    }
}
