<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Auth::routes();

Route::get('/test', 'PagesController@test');
Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale(), 'middleware' => 'lang'], function(){
    Route::get('/', 'PagesController@index')->name('index');
    Route::get('/item/{url}', 'ProductController@showProduct')->name('product');
    Route::get('/category/{id}', 'ProductController@showCategory')->name('category');
});

