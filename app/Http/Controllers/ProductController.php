<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Page;
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

    const ALL_CAT_URL = 'category';

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
    public function showAllCategories(Page $page)
    {
        return view('front-side.category.all', ['page' => $page->where('url', self::ALL_CAT_URL)->first()]);
    }

    /**
     * show main category or products or category
     * @param $id
     * @param Category $categories
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategory($id, Category $categories)
    {
        $category = $categories->findOrFail($id);
        if ($category->old_number) {
            $products = $category->products;

            return view('front-side.category.index', compact('category', 'products'));
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
        $products = $brand->products;

        return view('front-side.brand.index', compact('brand', 'products'));
    }
}
