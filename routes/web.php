<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

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


Route::get('/gallery', [App\Http\Controllers\FrontendController\GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/image', [App\Http\Controllers\FrontendController\GalleryController::class, 'image'])->name('gallery.image');
Route::get('/gallery/video', [App\Http\Controllers\FrontendController\GalleryController::class, 'video'])->name('gallery.video'); 

Route::get('/news', [App\Http\Controllers\FrontendController\NewsController::class, 'index'])->name('news');

Route::get('/contact', [App\Http\Controllers\FrontendController\ContactController::class, 'index'])->name('contact');


