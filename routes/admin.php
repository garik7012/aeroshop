<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin-side'], function () {
    Route::get('/', 'Admin\DashboardController@index');

    Route::group(['prefix' => 'orders', 'as' => 'admin.orders.'], function () {
        Route::get('/', 'Admin\OrdersController@index')->name('all');
        Route::get('/{id}', 'Admin\OrdersController@showOrder')->name('show');
        Route::post('/{id}', 'Admin\OrdersController@updateOrder')->name('update');
        Route::get('/delete/{id?}/', 'Admin\OrdersController@deleteOrder')->name('delete');
    });
});
