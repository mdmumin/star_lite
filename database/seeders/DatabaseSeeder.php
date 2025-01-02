<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Management\AboutUsPointSeeder;
use Database\Seeders\Management\AboutUsSeeder;
use Database\Seeders\Management\BannerSeeder;
use Database\Seeders\Management\ContactMessageRepliesSeeder;
use Database\Seeders\Management\ContactMessagesSeeder;
use Database\Seeders\Management\DynamicPageSeeder;
use Database\Seeders\Management\FaqSeeder;
use Database\Seeders\Management\GlanceSeeder;
use Database\Seeders\Management\MissionVissionSeeder;
use Database\Seeders\Management\OurGoalSeeder;
use Database\Seeders\Management\SettingTitleSeeder;
use Database\Seeders\Management\SocialMediaSeeder;
use Database\Seeders\Management\SubscriberSeeder;
use Database\Seeders\Management\TeamSeeder;
use Database\Seeders\Management\TestimonialSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            UserRoleTableSeeder::class,
            AboutUsPointSeeder::class,
            AboutUsSeeder::class,
            BannerSeeder::class,
            ContactMessageRepliesSeeder::class,
            ContactMessagesSeeder::class,
            DynamicPageSeeder::class,
            FaqSeeder::class,
            GlanceSeeder::class,
            MissionVissionSeeder::class,
            OurGoalSeeder::class,
            SettingTitleSeeder::class,
            SocialMediaSeeder::class,
            SubscriberSeeder::class,
            TeamSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
