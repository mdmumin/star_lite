<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/user', function () {
    // ...
})->middleware('auth:api');

Route::prefix('v1')
    ->middleware([
        // "check_token",
        "auth:api"
    ])
    ->namespace('App\Http\Controllers')
    ->group(function () {

        /** test api for all management */
        Route::prefix('/blog/category')
            ->group(function () {
                Route::get('/all', 'Management\BlogManagement\BlogCategory\Controller@all');
                Route::post('/store', 'Management\BlogManagement\BlogCategory\Controller@store');
                Route::post('/update', 'Management\BlogManagement\BlogCategory\Controller@update');
                Route::post('/soft-delete', 'Management\BlogManagement\BlogCategory\Controller@soft_delete');
                Route::post('/restore', 'Management\BlogManagement\BlogCategory\Controller@restore');
                Route::post('/destroy', 'Management\BlogManagement\BlogCategory\Controller@destroy');
                Route::post('/bulk-import', 'Management\BlogManagement\BlogCategory\Controller@bulk_import');
                Route::get('/{id}', 'Management\BlogManagement\BlogCategory\Controller@show');
            });

        Route::prefix('/blog/category/blog')
            ->group(function () {
                Route::get('/all', 'Management\BlogManagement\BlogCategoryBlog\Controller@all');
                Route::post('/store', 'Management\BlogManagement\BlogCategoryBlog\Controller@store');
                Route::post('/update', 'Management\BlogManagement\BlogCategoryBlog\Controller@update');
                Route::post('/destroy', 'Management\BlogManagement\BlogCategoryBlog\Controller@destroy');
                Route::get('/{id}', 'Management\BlogManagement\BlogCategoryBlog\Controller@show');
            });

        Route::prefix('/blog/tag')
            ->group(function () {
                Route::get('/all', 'Management\BlogManagement\BlogTag\Controller@all');
                Route::post('/store', 'Management\BlogManagement\BlogTag\Controller@store');
                Route::post('/update', 'Management\BlogManagement\BlogTag\Controller@update');
                Route::post('/soft-delete', 'Management\BlogManagement\BlogTag\Controller@soft_delete');
                Route::post('/restore', 'Management\BlogManagement\BlogTag\Controller@restore');
                Route::post('/destroy', 'Management\BlogManagement\BlogTag\Controller@destroy');
                Route::post('/bulk-import', 'Management\BlogManagement\BlogTag\Controller@bulk_import');
                Route::get('/{id}', 'Management\BlogManagement\BlogTag\Controller@show');
            });

        Route::prefix('/blog/tag/blog')
            ->group(function () {
                Route::get('/all', 'Management\BlogManagement\BlogTagBlog\Controller@all');
                Route::post('/store', 'Management\BlogManagement\BlogTagBlog\Controller@store');
                Route::post('/update', 'Management\BlogManagement\BlogTagBlog\Controller@update');
                Route::post('/soft-delete', 'Management\BlogManagement\BlogTagBlog\Controller@soft_delete');
                Route::post('/restore', 'Management\BlogManagement\BlogTagBlog\Controller@restore');
                Route::post('/destroy', 'Management\BlogManagement\BlogTagBlog\Controller@destroy');
                Route::post('/bulk-import', 'Management\BlogManagement\BlogTagBlog\Controller@bulk_import');
                Route::get('/{id}', 'Management\BlogManagement\BlogTagBlog\Controller@show');
            });

        Route::prefix('/blog')
            ->group(function () {
                Route::get('/all', 'Management\BlogManagement\Blog\Controller@all');
                Route::post('/store', 'Management\BlogManagement\Blog\Controller@store');
                Route::post('/update', 'Management\BlogManagement\Blog\Controller@update');
                Route::post('/soft-delete', 'Management\BlogManagement\Blog\Controller@soft_delete');
                Route::post('/restore', 'Management\BlogManagement\Blog\Controller@restore');
                Route::post('/destroy', 'Management\BlogManagement\Blog\Controller@destroy');
                Route::post('/bulk-import', 'Management\BlogManagement\Blog\Controller@bulk_import');
                Route::get('/{id}', 'Management\BlogManagement\Blog\Controller@show');
            });

        // Common Managemetn
        Route::prefix('/banner')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\Banner\Controller@all');
                Route::post('/store', 'Management\CommonManagement\Banner\Controller@store');
                Route::post('/update', 'Management\CommonManagement\Banner\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\Banner\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\Banner\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\Banner\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\Banner\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\Banner\Controller@show');
            });

        Route::prefix('/team')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\Team\Controller@all');
                Route::post('/store', 'Management\CommonManagement\Team\Controller@store');
                Route::post('/update', 'Management\CommonManagement\Team\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\Team\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\Team\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\Team\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\Team\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\Team\Controller@show');
            });

        Route::prefix('/testimonial')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\Testimonial\Controller@all');
                Route::post('/store', 'Management\CommonManagement\Testimonial\Controller@store');
                Route::post('/update', 'Management\CommonManagement\Testimonial\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\Testimonial\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\Testimonial\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\Testimonial\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\Testimonial\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\Testimonial\Controller@show');
            });

        Route::prefix('/dynamic/page')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\DynamicPage\Controller@all');
                Route::post('/store', 'Management\CommonManagement\DynamicPage\Controller@store');
                Route::post('/update', 'Management\CommonManagement\DynamicPage\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\DynamicPage\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\DynamicPage\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\DynamicPage\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\DynamicPage\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\DynamicPage\Controller@show');
            });

        Route::prefix('/mission/vission')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\MissionVission\Controller@all');
                Route::post('/store', 'Management\CommonManagement\MissionVission\Controller@store');
                Route::post('/update', 'Management\CommonManagement\MissionVission\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\MissionVission\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\MissionVission\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\MissionVission\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\MissionVission\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\MissionVission\Controller@show');
            });

        Route::prefix('/glance')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\AtAGlance\Controller@all');
                Route::post('/store', 'Management\CommonManagement\AtAGlance\Controller@store');
                Route::post('/update', 'Management\CommonManagement\AtAGlance\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\AtAGlance\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\AtAGlance\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\AtAGlance\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\AtAGlance\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\AtAGlance\Controller@show');
            });


        Route::prefix('/about')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\AboutUs\Controller@all');
                Route::post('/store', 'Management\CommonManagement\AboutUs\Controller@store');
                Route::post('/update', 'Management\CommonManagement\AboutUs\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\AboutUs\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\AboutUs\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\AboutUs\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\AboutUs\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\AboutUs\Controller@show');
            });

        Route::prefix('/about/point')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\AboutUsPoint\Controller@all');
                Route::post('/store', 'Management\CommonManagement\AboutUsPoint\Controller@store');
                Route::post('/update', 'Management\CommonManagement\AboutUsPoint\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\AboutUsPoint\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\AboutUsPoint\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\AboutUsPoint\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\AboutUsPoint\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\AboutUsPoint\Controller@show');
            });

        Route::prefix('/our/goal')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\OurGoal\Controller@all');
                Route::post('/store', 'Management\CommonManagement\OurGoal\Controller@store');
                Route::post('/update', 'Management\CommonManagement\OurGoal\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\OurGoal\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\OurGoal\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\OurGoal\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\OurGoal\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\OurGoal\Controller@show');
            });

        Route::prefix('/faq')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\Faq\Controller@all');
                Route::post('/store', 'Management\CommonManagement\Faq\Controller@store');
                Route::post('/update', 'Management\CommonManagement\Faq\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\Faq\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\Faq\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\Faq\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\Faq\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\Faq\Controller@show');
            });

        Route::prefix('setting/title')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\SettingTitle\Controller@all');
                Route::post('/store', 'Management\CommonManagement\SettingTitle\Controller@store');
                Route::post('/update', 'Management\CommonManagement\SettingTitle\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\SettingTitle\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\SettingTitle\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\SettingTitle\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\SettingTitle\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\SettingTitle\Controller@show');
            });

        Route::prefix('setting/value')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\SettingValue\Controller@all');
                Route::post('/store', 'Management\CommonManagement\SettingValue\Controller@store');
                Route::post('/update', 'Management\CommonManagement\SettingValue\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\SettingValue\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\SettingValue\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\SettingValue\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\SettingValue\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\SettingValue\Controller@show');
            });

        Route::prefix('subscriber')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\Subscriber\Controller@all');
                Route::post('/store', 'Management\CommonManagement\Subscriber\Controller@store');
                Route::post('/update', 'Management\CommonManagement\Subscriber\Controller@update');
                Route::post('/destroy', 'Management\CommonManagement\Subscriber\Controller@destroy');
                Route::get('/{id}', 'Management\CommonManagement\Subscriber\Controller@show');
            });

        Route::prefix('contact/message')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\ContactMessage\Controller@all');
                Route::post('/store', 'Management\CommonManagement\ContactMessage\Controller@store');
                Route::post('/update', 'Management\CommonManagement\ContactMessage\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\ContactMessage\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\ContactMessage\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\ContactMessage\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\ContactMessage\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\ContactMessage\Controller@show');
            });

        Route::prefix('contact/message/reply')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\ContactMessageReplies\Controller@all');
                Route::post('/store', 'Management\CommonManagement\ContactMessageReplies\Controller@store');
                Route::post('/update', 'Management\CommonManagement\ContactMessageReplies\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\ContactMessageReplies\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\ContactMessageReplies\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\ContactMessageReplies\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\ContactMessageReplies\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\ContactMessageReplies\Controller@show');
            });


        Route::prefix('social/media')
            ->group(function () {
                Route::get('/all', 'Management\CommonManagement\SocialMedia\Controller@all');
                Route::post('/store', 'Management\CommonManagement\SocialMedia\Controller@store');
                Route::post('/update', 'Management\CommonManagement\SocialMedia\Controller@update');
                Route::post('/soft-delete', 'Management\CommonManagement\SocialMedia\Controller@soft_delete');
                Route::post('/restore', 'Management\CommonManagement\SocialMedia\Controller@restore');
                Route::post('/destroy', 'Management\CommonManagement\SocialMedia\Controller@destroy');
                Route::post('/bulk-import', 'Management\CommonManagement\SocialMedia\Controller@bulk_import');
                Route::get('/{id}', 'Management\CommonManagement\SocialMedia\Controller@show');
            });

        // Property Category
        Route::prefix('property/category')
            ->group(function () {
                Route::get('/all', 'Management\PropertyManagement\PropertyCategory\Controller@all');
                Route::post('/store', 'Management\PropertyManagement\PropertyCategory\Controller@store');
                Route::post('/update', 'Management\PropertyManagement\PropertyCategory\Controller@update');
                Route::post('/soft-delete', 'Management\PropertyManagement\PropertyCategory\Controller@soft_delete');
                Route::post('/restore', 'Management\PropertyManagement\PropertyCategory\Controller@restore');
                Route::post('/destroy', 'Management\PropertyManagement\PropertyCategory\Controller@destroy');
                Route::post('/bulk-import', 'Management\PropertyManagement\PropertyCategory\Controller@bulk_import');
                Route::get('/{id}', 'Management\PropertyManagement\PropertyCategory\Controller@show');
            });

            Route::prefix('property/category/property')
            ->group(function () {
                Route::get('/all', 'Management\PropertyManagement\PropertyCategoryProperty\Controller@all');
                Route::post('/store', 'Management\PropertyManagement\PropertyCategoryProperty\Controller@store');
                Route::post('/update', 'Management\PropertyManagement\PropertyCategoryProperty\Controller@update');
                Route::post('/soft-delete', 'Management\PropertyManagement\PropertyCategoryProperty\Controller@soft_delete');
                Route::post('/restore', 'Management\PropertyManagement\PropertyCategoryProperty\Controller@restore');
                Route::post('/destroy', 'Management\PropertyManagement\PropertyCategoryProperty\Controller@destroy');
                Route::post('/bulk-import', 'Management\PropertyManagement\PropertyCategoryProperty\Controller@bulk_import');
                Route::get('/{id}', 'Management\PropertyManagement\PropertyCategoryProperty\Controller@show');
            });

        Route::prefix('property/tag')
            ->group(function () {
                Route::get('/all', 'Management\PropertyManagement\PropertyTag\Controller@all');
                Route::post('/store', 'Management\PropertyManagement\PropertyTag\Controller@store');
                Route::post('/update', 'Management\PropertyManagement\PropertyTag\Controller@update');
                Route::post('/soft-delete', 'Management\PropertyManagement\PropertyTag\Controller@soft_delete');
                Route::post('/restore', 'Management\PropertyManagement\PropertyTag\Controller@restore');
                Route::post('/destroy', 'Management\PropertyManagement\PropertyTag\Controller@destroy');
                Route::post('/bulk-import', 'Management\PropertyManagement\PropertyTag\Controller@bulk_import');
                Route::get('/{id}', 'Management\PropertyManagement\PropertyTag\Controller@show');
            });

        Route::prefix('property/tag/property')
            ->group(function () {
                Route::get('/all', 'Management\PropertyManagement\PropertyTagProperty\Controller@all');
                Route::post('/store', 'Management\PropertyManagement\PropertyTagProperty\Controller@store');
                Route::post('/update', 'Management\PropertyManagement\PropertyTagProperty\Controller@update');
                Route::post('/soft-delete', 'Management\PropertyManagement\PropertyTagProperty\Controller@soft_delete');
                Route::post('/restore', 'Management\PropertyManagement\PropertyTagProperty\Controller@restore');
                Route::post('/destroy', 'Management\PropertyManagement\PropertyTagProperty\Controller@destroy');
                Route::post('/bulk-import', 'Management\PropertyManagement\PropertyTagProperty\Controller@bulk_import');
                Route::get('/{id}', 'Management\PropertyManagement\PropertyTagProperty\Controller@show');
            });

        Route::prefix('property/label')
            ->group(function () {
                Route::get('/all', 'Management\PropertyManagement\PropertyLabel\Controller@all');
                Route::post('/store', 'Management\PropertyManagement\PropertyLabel\Controller@store');
                Route::post('/update', 'Management\PropertyManagement\PropertyLabel\Controller@update');
                Route::post('/soft-delete', 'Management\PropertyManagement\PropertyLabel\Controller@soft_delete');
                Route::post('/restore', 'Management\PropertyManagement\PropertyLabel\Controller@restore');
                Route::post('/destroy', 'Management\PropertyManagement\PropertyLabel\Controller@destroy');
                Route::post('/bulk-import', 'Management\PropertyManagement\PropertyLabel\Controller@bulk_import');
                Route::get('/{id}', 'Management\PropertyManagement\PropertyLabel\Controller@show');
            });

            Route::prefix('property/label/property')
            ->group(function () {
                Route::get('/all', 'Management\PropertyManagement\PropertyLabelProperty\Controller@all');
                Route::post('/store', 'Management\PropertyManagement\PropertyLabelProperty\Controller@store');
                Route::post('/update', 'Management\PropertyManagement\PropertyLabelProperty\Controller@update');
                Route::post('/soft-delete', 'Management\PropertyManagement\PropertyLabelProperty\Controller@soft_delete');
                Route::post('/restore', 'Management\PropertyManagement\PropertyLabelProperty\Controller@restore');
                Route::post('/destroy', 'Management\PropertyManagement\PropertyLabelProperty\Controller@destroy');
                Route::post('/bulk-import', 'Management\PropertyManagement\PropertyLabelProperty\Controller@bulk_import');
                Route::get('/{id}', 'Management\PropertyManagement\PropertyLabelProperty\Controller@show');
            });
    });
