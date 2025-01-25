<?php

use App\Http\Controllers\BackendController\AdminController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/token',function(){
    return User::first()->createToken('accessToken');
});

Route::group([
    // 'namespace' => 'App\Http\Controllers'
], function () {

    Route::get('/', [App\Http\Controllers\FrontendController\HomeController::class, 'index'])->name('home');

    Route::get('/about', [App\Http\Controllers\FrontendController\AboutController::class, 'index'])->name('about');

    Route::get('/properties', [App\Http\Controllers\FrontendController\PropertiesController::class, 'index'])->name('properties');
    Route::get('/properties/luxury', [App\Http\Controllers\FrontendController\PropertiesController::class, 'luxury'])->name('properties.luxury');
    Route::get('/properties/comercial', [App\Http\Controllers\FrontendController\PropertiesController::class, 'comercial'])->name('properties.comercial');
    Route::get('/properties/classic', [App\Http\Controllers\FrontendController\PropertiesController::class, 'classic'])->name('properties.classic');
    Route::get('/properties/wellness', [App\Http\Controllers\FrontendController\PropertiesController::class, 'wellness'])->name('properties.wellness');
    Route::get('/properties/onging', [App\Http\Controllers\FrontendController\PropertiesController::class, 'ongoing'])->name('properties.ongoing');
    Route::get('/properties/upcoming', [App\Http\Controllers\FrontendController\PropertiesController::class, 'upcoming'])->name('properties.upcoming');
    Route::get('/properties/completed', [App\Http\Controllers\FrontendController\PropertiesController::class, 'completed'])->name('properties.completed');
    Route::get('/properties/details', [App\Http\Controllers\FrontendController\PropertiesController::class, 'details'])->name('properties_details');

    Route::get('/gallery', [App\Http\Controllers\FrontendController\GalleryController::class, 'index'])->name('gallery');
    Route::get('/gallery/image', [App\Http\Controllers\FrontendController\GalleryController::class, 'image'])->name('gallery.image');
    Route::get('/gallery/video', [App\Http\Controllers\FrontendController\GalleryController::class, 'video'])->name('gallery.video');

    Route::get('/news', [App\Http\Controllers\FrontendController\NewsController::class, 'index'])->name('news');
    Route::get('/news/details', [App\Http\Controllers\FrontendController\NewsController::class, 'news_details'])->name('news_details');

    Route::get('/contact', [App\Http\Controllers\FrontendController\ContactController::class, 'index'])->name('contact');
});


Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers', 'middleware' => ['auth']], function () {

    Route::get('/admin', 'BackendController\AdminController@admin')->name('admin');

    Route::get('/user/index', 'BackendController\UserController@index')->name('user_index');
    Route::get('/user/create', 'BackendController\UserController@create')->name('user_create');
    Route::post('/user/store', 'BackendController\UserController@store')->name('user_store');
    Route::get('/user/edit/{id}', 'BackendController\UserController@edit')->name('user_edit');
    Route::post('/user/update/{id}', 'BackendController\UserController@update')->name('user_update');
    Route::post('/user/delete/{id}', 'BackendController\UserController@delete')->name('user_delete');
    Route::get('/user/search', 'BackendController\UserController@search')->name('user_search');

    Route::get('/user/role/index', 'BackendController\UserRoleController@index')->name('user_role_index');
    Route::get('/user/role/create', 'BackendController\UserRoleController@create')->name('user_role_create');
    Route::post('/user/role/store', 'BackendController\UserRoleController@store')->name('user_role_store');
    Route::get('/user/role/edit/{id}', 'BackendController\UserRoleController@edit')->name('user_role_edit');
    Route::post('/user/role/update/{id}', 'BackendController\UserRoleController@update')->name('user_role_update');
    Route::post('/user/role/delete/{id}', 'BackendController\UserRoleController@delete')->name('user_role_delete');


    Route::get('home/banner/index', 'Management\BannerController@index')->name('home_banner_index');
    Route::get('/home/banner/create', 'Management\BannerController@create')->name('home_banner_create');
    Route::post('/home/banner/store', 'Management\BannerController@store')->name('home_banner_store');

    Route::get('home/blog/index', 'BackendController\BlogManagement\BlogController@index')->name('blog_index');
    Route::get('/home/banner/create', 'Management\BannerController@create')->name('home_banner_create');
    Route::post('/home/banner/store', 'Management\BannerController@store')->name('home_banner_store');
});

// Route::get('/admin', [App\Http\Controllers\BackendController\AdminController::class, 'index'])->middleware('admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('/adminvue', 'backend.index');