<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin-side'], function () {
    Route::get('/', 'Admin\DashboardController@index');
    //pages
    Route::group(['prefix' => 'pages', 'as' => 'admin.pages.'], function () {
        Route::get('/', 'Admin\PagesController@index')->name('all');
        Route::get('/{id}/{locale?}', 'Admin\PagesController@showPage')->name('show');
        Route::post('/{id}', 'Admin\PagesController@updatePage')->name('update');
    });
    //orders
    Route::group(['prefix' => 'orders', 'as' => 'admin.orders.'], function () {
        Route::get('/', 'Admin\OrdersController@index')->name('all');
        Route::get('/{id}', 'Admin\OrdersController@showOrder')->name('show');
        Route::post('/{id}', 'Admin\OrdersController@updateOrder')->name('update');
        Route::get('/delete/{id?}/', 'Admin\OrdersController@deleteOrder')->name('delete');
    });
    //contact messages
    Route::group(['prefix' => 'messages', 'as' => 'admin.messages.'], function () {
        Route::get('/', 'Admin\ContactUsController@showAll')->name('all');
        Route::get('/delete/{id?}/', 'Admin\ContactUsController@deleteMessage')->name('delete');
    });
});
