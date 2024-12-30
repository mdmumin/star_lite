<?php

namespace Database\Seeders\Management;

use App\Models\Management\Testimonial;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            [
                'name' => 'Abul Kashem',
                'designation' => 'Landowner, Starlit Choyon. Ex-Chairman, CODEC',
                'image' => 'Kashem.jpg',
                'contact_number' => '1234567890',
                'email' => '@example.com',
                'comment' => 'I always appreciate the firmness in commitment of Starlit Homes ltd. Their management is generous',
                'description' => 'I always appreciate the firmness in commitment of Starlit Homes ltd. Their management is generous and benevolent. They are friendly and their dealing is transparent.',
                'created_at' => Carbon::now()
                
            ],

            [
                'name' => 'Engr. Md. Kawser Ali',
                'designation' => 'Flat owner, Starlit Shamsia. Chief Operating Officer, Youth Group',
                'image' => 'Kawser.jpg',
                'contact_number' => '9876543210',
                'email' => '@example.com',
                'comment' => 'Starlit Homes Ltd is a very structured real estate firm. I came to know their expertises. Their dealing is fair & transparent.',
                'description' => 'Starlit Homes Ltd is a very structured real estate firm. I came to know their expertises. Their dealing is fair & transparent. They make affordable flats and apartments in terms of price, location and quality.',
                'created_at' => Carbon::now()
            ],

            [
                'name' => 'Khondker Abul Qasem',
                'designation' => 'Landowner, Stralit Bonolata Director, Nikki Thai Industries Ltd.',
                'image' => 'Khondker.jpg',
                'comment' => 'Starlit Homes Ltd is technically very sound. They have expert engineers. Its their expertises in c onstruction field.',
                'description' => 'Starlit Homes Ltd is technically very sound. They have expert engineers. Its their expertises in c onstruction field that allures me to make a solid contract with them.',
                'created_at' => Carbon::now()
            ],
            
        
     ]);
    }
}
