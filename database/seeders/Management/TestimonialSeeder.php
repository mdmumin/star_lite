<?php

namespace Database\Seeders\Management;

use App\Models\Management\Testimonial;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Abul Kashem',
                'designation' => 'Landowner, Starlit Choyon. Ex-Chairman, CODEC',
                'image' => 'Kashem.jpg',
                'comment' => 'I always appreciate the firmness in commitment of Starlit Homes ltd. Their management is generous',
                'creator' => 1,
                'slug' => Str::slug('John Doe Testimonial'),
                'status' => 1,
            ],

            [
                'name' => 'Engr. Md. Kawser Ali',
                'designation' => 'Flat owner, Starlit Shamsia. Chief Operating Officer, Youth Group',
                'image' => 'Kawser.jpg',
                'comment' => 'Starlit Homes Ltd is a very structured real estate firm. I came to know their expertises. Their dealing is fair & transparent.',
                'creator' => 2,
                'slug' => Str::slug('Jane Smith Testimonial'),
                'status' => 1,
            ],

            [

                'name' => 'Khondker Abul Qasem',
                'designation' => 'Landowner, Stralit Bonolata Director, Nikki Thai Industries Ltd.',
                'image' => 'Khondker.jpg',
                'comment' => 'Starlit Homes Ltd is technically very sound. They have expert engineers. Its their expertises in c onstruction field.',
                'creator' => 3,
                'slug' => Str::slug('David Brown Testimonial'),
                'status' => 1,
            ],


        ];

        foreach ($data as $item) {
            Testimonial::create($item);
        }
    }
}
