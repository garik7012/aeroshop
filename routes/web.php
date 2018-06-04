<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale(), 'middleware' => 'lang'], function () {
    Route::get('/test', 'PagesController@test');
    //pages
    Route::get('/', 'PagesController@index')->name('index');
    Route::get('/contact-us', 'PagesController@contactUs')->name('contact-us');
    Route::post('/contact-us', 'Admin\ContactUsController@storeContact')->name('store-contact');
    Route::get('/faq', 'PagesController@showFAQ')->name('faq');
    Route::get('/delivery', 'PagesController@delivery')->name('delivery');
    //products
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
    //order
    Route::get('/checkout', 'OrderController@createOrder')->name('checkout');
    Route::post('/order-store', 'OrderController@storeOrder')->name('order.store');
    Route::get('/order-store', 'OrderController@showOrder')->name('order.show');
    Route::post('/checkout', 'OrderController@confirmOrder')->name('confirm-order');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');


