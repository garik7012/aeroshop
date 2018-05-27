<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Product Controller
    |--------------------------------------------------------------------------
    |
    | This controller shows product, category, brand pages.
    |
    */

    public function showProduct($url, Product $products)
    {
        $product = $products->where('url', $url)->firstOrFail();
        $lt = \App::getLocale() . '_title';
        $relatedProducts = $products->where('category_id', $product->category_id)->limit(6)->get();

        return view('front-side.product.index', compact('product', 'relatedProducts', 'lt'));
    }
}
