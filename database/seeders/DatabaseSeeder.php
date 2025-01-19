<?php

namespace Database\Seeders;

use App\Models\Property\PropertyCategories;
use App\Models\Property\PropertyLabels;
use App\Models\Property\PropertyTags;
use App\Models\User;
use Database\Seeders\BlogManagement\BlogCategoriesSeeder;
use Database\Seeders\BlogManagement\BlogCategoryBlogSeeder;
use Database\Seeders\BlogManagement\BlogCommentsSeeder;
use Database\Seeders\BlogManagement\BlogLikesSeeder;
use Database\Seeders\BlogManagement\BlogsSeeder;
use Database\Seeders\BlogManagement\BlogTagBlogSeeder;
use Database\Seeders\BlogManagement\BlogTagsSeeder;
use Database\Seeders\BlogManagement\BlogViewsSeeder;
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
use Database\Seeders\Property\PropertiesSeeder;
use Database\Seeders\Property\PropertyCategoryPropertySeeder;
use Database\Seeders\Property\PropertyCategorySeeder;
use Database\Seeders\Property\PropertyCommentSeeder;
use Database\Seeders\Property\PropertyDetailsTitleSeeder;
use Database\Seeders\Property\PropertyDetailsTitleValueSeeder;
use Database\Seeders\Property\PropertyFaqSeeder;
use Database\Seeders\Property\PropertyFloorPlanCategoriesSeeder;
use Database\Seeders\Property\PropertyFloorPlanCategoryContentSeeder;
use Database\Seeders\Property\PropertyFloorPlanKeyValueSeeder;
use Database\Seeders\Property\PropertyGalleriesSeeder;
use Database\Seeders\Property\PropertyKeyFeatureSeeder;
use Database\Seeders\Property\PropertyKeyFeatureValueSeeder;
use Database\Seeders\Property\PropertyLabelPropertySeeder;
use Database\Seeders\Property\PropertyLabelSeeder;
use Database\Seeders\Property\PropertyLikeSeeder;
use Database\Seeders\Property\PropertyRelatedPropertiesSeeder;
use Database\Seeders\Property\PropertyTagPropertySeeder;
use Database\Seeders\Property\PropertyTagSeeder;
use Database\Seeders\Property\PropertyViewSeeder;
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
            // User Managemetn 
            UserSeeder::class,
            UserRoleTableSeeder::class,
            
            // Managemnt 
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

            // Property Management 

            PropertiesSeeder::class,
            PropertyCategorySeeder::class,
            PropertyTagSeeder::class,
            PropertyLabelSeeder::class,
            PropertyCategoryPropertySeeder::class,
            PropertyTagPropertySeeder::class,
            PropertyLabelPropertySeeder::class,
            PropertyDetailsTitleSeeder::class,
            PropertyDetailsTitleValueSeeder::class,
            PropertyRelatedPropertiesSeeder::class,
            PropertyFloorPlanKeyValueSeeder::class,
            PropertyKeyFeatureSeeder::class,
            PropertyKeyFeatureValueSeeder::class,
            PropertyFloorPlanKeyValueSeeder::class,
            PropertyFloorPlanCategoriesSeeder::class,
            PropertyFloorPlanCategoryContentSeeder::class,
            PropertyCommentSeeder::class,
            PropertyLikeSeeder::class,
            PropertyViewSeeder::class,
            PropertyFaqSeeder::class,
            PropertyGalleriesSeeder::class,

            // Blog Management 

            BlogCategoriesSeeder::class,
            BlogTagsSeeder::class,
            BlogCategoryBlogSeeder::class,
            BlogTagBlogSeeder::class,
            BlogsSeeder::class,
            BlogCommentsSeeder::class,
            BlogLikesSeeder::class,
            BlogViewsSeeder::class,
        ]);
    }
}
