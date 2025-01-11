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
        // "auth:api"
    ])
    ->namespace('App\Http\Controllers')
    ->group(function () {

        /** test api for all management */
        Route::prefix('/test')
            ->group(function () {
                Route::get('/all', 'Management\BlogCategory\Controller@all');
                Route::post('/store', 'Management\BlogCategory\Controller@store');
                Route::post('/update', 'Management\BlogCategory\Controller@update');
                Route::post('/soft-delete', 'Management\BlogCategory\Controller@soft_delete');
                Route::post('/restore', 'Management\BlogCategory\Controller@restore');
                Route::post('/destroy', 'Management\BlogCategory\Controller@destroy');
                Route::post('/bulk-import', 'Management\BlogCategory\Controller@bulk_import');
                Route::get('/{id}', 'Management\BlogCategory\Controller@show');
            });

    });
