<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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

    /**
     * show single product
     * @param $url
     * @param Product $products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProduct($url, Product $products)
    {
        $product = $products->where('url', $url)->firstOrFail();
        $relatedProducts = $products->where('category_id', $product->category_id)->limit(6)->get();

        return view('front-side.product.index', compact('product', 'relatedProducts'));
    }

    /**
     * show all categories
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllCategories()
    {
        return view('front-side.category.all');
    }

    /**
     * show main category or products or category
     * @param $id
     * @param Category $categories
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategory($id, Category $categories, Product $product)
    {
        $category = $categories->findOrFail($id);
        if ($category->old_number) {
            $categoryProducts = $category->products;

            return view('front-side.category.index', compact('category', 'categoryProducts'));
        } else {
            return view('front-side.category.main-category', compact('category'));
        }
    }

    public function showBrands(Brand $brand)
    {
        return view('front-side.brand.brands', ['brands' => $brand->all()]);
    }

    public function showBrandProducts($id, Brand $brands)
    {
        $brand = $brands->findOrFail($id);

        return view('front-side.brand.index', compact('brand'));
    }
}
