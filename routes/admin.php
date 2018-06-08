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
    //categories
    Route::group(['prefix' => 'categories', 'as' => 'admin.categories.'], function () {
        Route::get('/', 'Admin\CategoriesController@index')->name('all');
        Route::get('/{id}/{locale?}', 'Admin\CategoriesController@showCategory')->name('show');
        Route::post('lang/{id}/{locale}', 'Admin\CategoriesController@updateLangCategory')->name('update-lang');
        Route::post('/{id}', 'Admin\CategoriesController@updateCategory')->name('update');
    });
    //products
    Route::group(['prefix' => 'products', 'as' => 'admin.products.'], function () {
        Route::get('/', 'Admin\ProductsController@index')->name('all');
        Route::get('/images/{id}', 'Admin\ProductsController@showImages')->name('images');
        Route::get('/image-main/{product_id}/{image_id}', 'Admin\ProductsController@makeImageMain')->name('image-main');
        Route::get('/image-delete/{product_id}/{image_id?}', 'Admin\ProductsController@deleteImage')->name('image-delete');
        Route::post('/images/{id}', 'Admin\ProductsController@addImage')->name('add-image');
        Route::get('delete-prop/{id}/{prop_id?}', 'Admin\ProductsController@deleteProperty')->name('delete-property');
        Route::get('/{id}/{locale}', 'Admin\ProductsController@showProduct')->name('show');
        Route::post('/{id}', 'Admin\ProductsController@updateProduct')->name('update');
        Route::post('lang/{id}/{locale}', 'Admin\ProductsController@updateProductLang')->name('update-lang');
        Route::post('add-prop/{id}', 'Admin\ProductsController@addProperty')->name('add-property');
    });
    //YML generate
    Route::group(['prefix' => 'price', 'as' => 'admin.price.'], function () {
        Route::get('/', 'Admin\PriceController@index')->name('index');
        Route::post('/', 'Admin\PriceController@generate')->name('generate');
    });
    //added parameters
    Route::group(['prefix' => 'params', 'as' => 'admin.params.'], function () {
        Route::get('availabilities', 'Admin\ParametersController@showAvailabilities')->name('availabilities');
        Route::get('countries', 'Admin\ParametersController@showCountries')->name('countries');
        Route::get('properties', 'Admin\ParametersController@showProperties')->name('properties');
        Route::get('units', 'Admin\ParametersController@showUnits')->name('units');
        Route::post('add-item', 'Admin\ParametersController@addItem')->name('add-item');
    });
    //currencies
    Route::group(['prefix' => 'currencies', 'as' => 'admin.currencies.'], function () {
        Route::get('/', 'Admin\CurrenciesController@index')->name('all');
        Route::post('/change', 'Admin\CurrenciesController@changeRate')->name('change');
        Route::post('/add', 'Admin\CurrenciesController@addCurrency')->name('add');
    });
});
