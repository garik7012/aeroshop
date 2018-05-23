<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin-side'], function () {
    Route::get('/', 'Admin\DashboardController@index');
});
