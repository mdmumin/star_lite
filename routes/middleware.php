<?php

use Illuminate\Support\Facades\Route;




Route::group(['middleware' => ['admin', 'modarator']], function () {
    Route::get('/test/create', function () {
        dd('he can create');
    });
    Route::get('/test/edit', function () {
        dd('he can edit');
    });
    Route::get('/test/delete', function () {
        dd('he can delete');
    });
});



Route::get('user', function () {
    dd('user can visit this area');
});

Route::get('employee', function () {
    dd('employee can visit this area');
});

Route::get('tester', function () {
    dd('tester can visit this area');
});
