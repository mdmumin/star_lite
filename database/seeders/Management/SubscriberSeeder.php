<?php

namespace Database\Seeders\Management;

use App\Models\Management\Subscriber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'email' => 'example1@gmail.com',
                'whatsapp' => '+123456789',
                'date' => '2024-01-01',
                'creator' => '1',
                'slug' => 'example1-subscriber',
                'status' => 1,
            ],
            [
                'email' => 'example2@gmail.com',
                'whatsapp' => '+987654321',
                'date' => '2024-02-01',
                'creator' => '1',
                'slug' => 'example2-subscriber',
                'status' => 1,
            ],
            [
                'email' => 'example3@gmail.com',
                'whatsapp' => '+192837465',
                'date' => '2024-03-01',
                'creator' => '1',
                'slug' => 'example3-subscriber',
                'status' => 0,
            ],
        ];

        foreach($data as $item){
            Subscriber::create($item);
        }
    }
}
