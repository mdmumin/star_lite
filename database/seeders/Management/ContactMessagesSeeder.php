<?php

namespace Database\Seeders\Management;

use App\Models\Management\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'property_id' => 1,
                'name' => 'Mohammod Navi',
                'email' => 'mdmuminjap@gmail.com',
                'profession' => 'Engineer',
                'subject' => 'Inquiry about property',
                'contact_number' => '1234567890',
                'message' => 'I would like more information about this property.',
                'is_seen' => false,
                'is_replied' => false,
                'ip' => '192.168.1.1',
                'location' => 'New York, USA',
            ],
            [
                'property_id' => 2,
                'name' => 'Nahid Rana',
                'email' => 'anamulhasanjap@gmail.com',
                'profession' => 'Doctor',
                'subject' => 'Property details',
                'contact_number' => '0987654321',
                'message' => 'Please provide me with the details of this property.',
                'is_seen' => false,
                'is_replied' => false,
                'ip' => '192.168.1.2',
                'location' => 'Los Angeles, USA',
            ]
        ];

        foreach ($data as $item) {
            ContactMessage::create($item);
        }
    }
}
