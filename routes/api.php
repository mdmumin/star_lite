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
    });
