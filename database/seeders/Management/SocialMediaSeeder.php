<?php

namespace Database\Seeders\Management;

use App\Models\Management\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Facebook',
                'icon' => 'fab fa-facebook',
                'url' => 'https://facebook.com',
                'creator' => 'Admin',
                'slug' => 'facebook-social',
                'status' => 1,
            ],
            [
                'title' => 'Twitter',
                'icon' => 'fab fa-twitter',
                'url' => 'https://twitter.com',
                'creator' => 'User1',
                'slug' => 'twitter-social',
                'status' => 1,
            ],
            [
                'title' => 'LinkedIn',
                'icon' => 'fab fa-linkedin',
                'url' => 'https://linkedin.com',
                'creator' => 'Admin',
                'slug' => 'linkedin-social',
                'status' => 0,
            ],
        ];

        foreach($data as $item){
            SocialMedia::create($item);
        }
    }
}
