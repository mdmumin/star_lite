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

        Route::prefix('/test')
            ->group(function () {
                Route::get('/all', 'TestApiController@users');
                Route::post('/store', 'TestApiController@store');
                Route::post('/update', 'TestApiController@update');
                Route::post('/soft-delete', 'TestApiController@soft_delete');
                Route::post('/restore', 'TestApiController@restore');
                Route::post('/destroy', 'TestApiController@destroy');
                Route::post('/bulk-import', 'TestApiController@bulk_import');
                Route::get('/{id}', 'TestApiController@show');
            });
        });