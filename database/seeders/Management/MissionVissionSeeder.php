<?php

namespace Database\Seeders\Management;

use App\Models\Management\MissionVission;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionVissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'type' => 'Our Mission',
                'image' => 'mission.jpg',
                'description' => 'At Starlite, our mission is to illuminate the path to homeownership and investment with integrity, innovation, and excellence. We are dedicated to empowering individuals and families by providing exceptional real estate solutions tailored to their unique needs. Through expert guidance, transparent.',
                'slug' => 'about-us-title',
                'creator' => 1,
                'status' => 1,
                'created_at' => Carbon::now()
            ],

            [
                'type' => 'Our Vission',
                'image' => 'vission.jpg',
                'description' => 'At Starlite, our mission is to illuminate the path to homeownership and investment with integrity, innovation, and excellence. We are dedicated to empowering individuals and families by providing exceptional real estate solutions tailored to their unique needs.',
                'slug' => 'about-us-title',
                'creator' => 1,
                'status' => 1,
                'created_at' => Carbon::now()
            ],      
        ];

        foreach($data as $item){
            MissionVission::create($item);
        }
    }
}
