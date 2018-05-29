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
        $relatedProducts = $products->where('category_id', $product->category_id)->limit(6)->get();

        return view('front-side.product.index', compact('product', 'relatedProducts'));
    }

    public function showCategory($id, Category $categories)
    {
        $category = $categories->findOrFail($id);
        if ($category->old_number) {
            return view('front-side.category.index', compact('category'));
        } else {
            return view('front-side.category.main-category', compact('category'));
        }
    }
}
