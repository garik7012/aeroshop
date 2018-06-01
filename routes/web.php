<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Auth::routes();

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale(), 'middleware' => 'lang'], function () {
    Route::get('/test', 'PagesController@test');
    Route::get('/', 'PagesController@index')->name('index');
    Route::get('/item/{url}', 'ProductController@showProduct')->name('product');
    Route::get('/category', 'ProductController@showAllCategories')->name('all-categories');
    Route::get('/category/{id}', 'ProductController@showCategory')->name('category');
    Route::get('/brand', 'ProductController@showBrands')->name('brands');
    Route::get('/brand/{id}', 'ProductController@showBrandProducts')->name('brand-products');
    //cart
    Route::get('/cart', "CartController@showCart")->name('show-cart');
    Route::post('/cart', "CartController@updateCart")->name('cart-update');
    Route::get('/add_to_cart/{id}', "CartController@addOneToCart")->name('one-to-cart');
    Route::post('/add_to_cart/{id}', "CartController@addToCart")->name('add-to-cart');
    Route::get('/delete_from_cart/{id}', "CartController@deleteItemFromCart")->name('delete-from-cart');
    Route::get('/checkout', 'Admin\OrderController@createOrder')->name('checkout');
    Route::post('/order-store', 'Admin\OrderController@storeOrder')->name('order.store');
    Route::get('/order-store', 'Admin\OrderController@showOrder')->name('order.show');
    Route::post('/checkout', 'Admin\OrderController@confirmOrder')->name('confirm-order');
});


