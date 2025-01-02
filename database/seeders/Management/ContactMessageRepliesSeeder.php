<?php

namespace Database\Seeders\Management;

use App\Models\Management\ContactMessageReplies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactMessageRepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'subject' => 'Welcome Message',
                'message' => 'Thank you for contacting us. We will get back to you shortly.',
                'is_seen' => false,
                'creator' => 'System',
                'slug' => 'welcome-message',
                'status' => 1,
            ],
            [
                'subject' => 'Follow-up',
                'message' => 'We are following up on your recent inquiry. Please let us know if you need further assistance.',
                'is_seen' => false,
                'creator' => 'Support Team',
                'slug' => 'follow-up',
                'status' => 1,
            ],
            [
                'subject' => 'Issue Resolved',
                'message' => 'Your issue has been resolved. Please confirm if everything is working fine now.',
                'is_seen' => true,
                'creator' => 'Support Team',
                'slug' => 'issue-resolved',
                'status' => 1,
            ],
        ];
        foreach ($data as $item) {
            ContactMessageReplies::create($item);
        }
    }
}