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
    Route::get('/category', 'ProductController@showAllCategories')->name('all-categories');
    Route::get('/category/{id}', 'ProductController@showCategory')->name('category');
    Route::get('/brand', 'ProductController@showBrands')->name('brands');
    Route::get('/brand/{id}', 'ProductController@showBrandProducts')->name('brand-products');
    //cart
    Route::get('/cart', "CartController@showCart")->name('show-cart');
    Route::get('/add_to_cart/{id}', "CartController@addOneToCart")->name('one-to-cart');
    Route::post('/add_to_cart/{id}', "CartController@addToCart")->name('add-to-cart');
    Route::get('/delete_from_cart/{id}', "CartController@deleteItemFromCart")->name('delete-from-cart');
    Route::post('/update-cart', "CartController@updateCart")->name('cart-update');
});

