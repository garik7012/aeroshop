<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Availability;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductLangProperty;
use App\Models\ProductPageLang;
use App\Models\ProductPropertyKey;
use App\Models\Unit;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * show products table
     * @param Brand $brand
     * @param Category $category
     * @param Availability $availability
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Brand $brand, Category $category, Availability $availability)
    {
        $brands = $brand->pluck('title')->toArray();
        $availabilities = $availability->all();
        $categories = $category->all();

        return view('admin.products.index', compact('brands', 'categories', 'availabilities'));
    }

    public function getProducts(Product $product)
    {
        $products = $product->all();
        $data = [];
        foreach ($products as $product) {
            $data[] = [
                $product->id,
                $product->ru_title,
                $product->category->ru_title,
                $product->brand ? $product->brand->title : '',
                $product->availability->ru_title,
                $product->is_featured,
                $product->is_active,
                [$product->url, $product->id]
            ];
        }

        return response()->json(['data' => $data]);
    }

    /**
     * show lang product
     * @param $id
     * @param $locale
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProduct(
        $id,
        $locale,
        Product $product,
        Brand $brand,
        Category $category,
        Country $country,
        Unit $unit,
        ProductPropertyKey $propertyKey
    ) {
        $product = $product->findOrFail($id);
        app()->setLocale($locale);
        $brands = $brand->all();
        $countries = $country->all();
        $categories = $category->where('old_number', '>', 0)->orderBy('parent_id')->get();
        $propertyKeys = $propertyKey->all();
        $units = $unit->all();

        return view(
            'admin.products.update',
            compact('product', 'locale', 'brands', 'categories', 'countries', 'units', 'propertyKeys')
        );
    }

    /**
     * update product
     * @param $id
     * @param ProductRequest $request
     * @param Product $product
     * @param ProductService $productService
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function updateProduct($id, ProductRequest $request, Product $product, ProductService $productService)
    {
        $product = $product->findOrFail($id);

        if ($productService->updateProduct($product, $request)) {
            return back()->with('success', 'Успешно обновлено');
        } else {
            return back()->with('danger', 'product update failed');
        }
    }

    /**
     * update product lang description. seo
     * @param $id
     * @param $locale
     * @param Request $request
     * @param ProductPageLang $productLang
     * @param ProductService $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function updateProductLang($id, $locale, Request $request, ProductPageLang $productLang, ProductService $service)
    {
        $request->validate([
            'seo_description' => 'max:250',
            'title' => 'max:250',
            'keywords' => 'max:250',
        ]);
        $productLang = $productLang->where('locale', $locale)->where('product_id', $id)->firstOrFail();

        if ($service->updateProductLang($productLang, $request)) {
            return back()->with('success', 'Успешно обновлено');
        } else {
            return back()->with('danger', 'product update failed');
        }
    }

    /**
     * delete property
     * @param $id
     * @param $property_id
     * @param ProductLangProperty $productProperty
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProperty($id, $property_id, ProductLangProperty $productProperty)
    {
        $productProperty = $productProperty->findOrFail($property_id);

        if ($productProperty->product_id == $id and $productProperty->delete()) {
            return back()->with('success', 'Успешно удалено');
        } else {
            return back()->with('danger', 'product update failed');
        }
    }

    /**
     * add property to product
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addProperty($id, Request $request)
    {
        $request->validate([
            'key_id' => 'required',
            'ru_value' => 'max:250',
            'uk_value' => 'max:250',
            'en_value' => 'max:250',
        ]);

        $productProperty = new ProductLangProperty();
        $productProperty->product_id = $id;
        $productProperty->key_id = $request->key_id;
        $productProperty->ru_value = $request->ru_value;
        $productProperty->en_value = $request->en_value;
        $productProperty->uk_value = $request->uk_value;
        $productProperty->unit_id = $request->unit_id;

        if ($productProperty->save()) {
            return back()->with('success', 'Успешно сохранено');
        } else {
            return back()->with('danger', 'не удалось сохранить свойство');
        }
    }

    /**
     * show product images
     * @param $id
     * @param Product $products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showImages($id, Product $products)
    {
        return view('admin.products.images', ['product' => $products->findOrFail($id)]);
    }

    /**
     * make image main
     * @param $product_id
     * @param $image_id
     * @param Product $product
     * @param ProductService $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function makeImageMain($product_id, $image_id, Product $product, ProductService $service)
    {
        $product = $product->findOrFail($product_id);

        if ($service->setImageMain($product, $image_id)) {
            return back()->with('success', 'Успешно установлено');
        } else {
            return back()->with('danger', 'Не удалось сделать главным изображение');
        }
    }

    /**
     * delete product image
     * @param $product_id
     * @param $image_id
     * @param ProductImage $productImage
     * @param ProductService $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteImage($product_id, $image_id, ProductImage $productImage, ProductService $service)
    {
        $image = $productImage->where('id', $image_id)->where('product_id', $product_id)->firstOrFail();
        if ($service->deleteImage($image)) {
            return back()->with('success', 'Успешно удалено');
        } else {
            return back()->with('danger', 'Не удалось удалить изображение');
        }
    }

    /**
     * add image
     * @param $id
     * @param Request $request
     * @param ProductService $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function addImage($id, Request $request, ProductService $service)
    {
        $request->validate([
            'image' => 'required|image'
        ]);
        if ($service->addImage($id, $request)) {
            return back()->with('success', 'Успешно добавлено');
        } else {
            return back()->with('danger', 'Не удалось добавить изображение');
        }
    }
}
