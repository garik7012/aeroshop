<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\ProductPageLang;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class PagesController extends Controller
{
    const INDEX_URL = '/';
    const CONTACTS_URL = 'contact-us';
    const FAQ_URL = 'faq';
    const DELIVERY_URL = 'delivery';

    /**
     * show index page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Product $product, Page $page)
    {
        $products = $product->where('is_active', 1)->orderBy('is_featured', 'desc')->limit(8)->get();
        $locale = \App::getLocale();
        $page = $page->where('url', self::INDEX_URL)->first();


        return view('index', compact('products', 'locale', 'page'));
    }

    public function contactUs(Page $page)
    {
        $page = $page->where('url', self::CONTACTS_URL)->first();

        return view('front-side.contact-us', compact('page'));
    }

    public function showFAQ(Page $page)
    {
        $page = $page->where('url', self::FAQ_URL)->first();

        return view('front-side.faq', compact('page'));
    }

    public function delivery(Page $page)
    {
        $page = $page->where('url', self::DELIVERY_URL)->first();

        return view('front-side.delivery', compact('page'));
    }

    public function test()
    {
        $file = public_path('YMLPrice.xml');

        $settings = (new Settings())
            ->setOutputFile($file)
            ->setEncoding('utf-8')
        ;

// Creating ShopInfo object (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#shop)
        $shopInfo = (new ShopInfo())
            ->setName('AeroShop')
            ->setCompany('Интернет магазин AeroShop')
            ->setUrl('http://aeroshop.com.ua')
        ;

// Creating currencies array (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#currencies)
        $currencies = [];
        foreach (\App\Models\Currency::all() as $currency) {
            $currencies[] = (new Currency())
                ->setId($currency->code)
                ->setRate($currency->rate);
        }


// Creating categories array (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#categories)
        $categories = [];
        foreach (\App\Models\Category::all() as $category) {
            if ($category->parent_id > 0) {
                $categories[] = (new Category())
                    ->setId($category->id)
                    ->setName($category->ru_title)
                    ->setParentId($category->parent_id);
            } else {
                $categories[] = (new Category())
                    ->setId($category->id)
                    ->setName($category->ru_title);
            }
        }

// Creating offers array (https://yandex.ru/support/webmaster/goods-prices/technical-requirements.xml#offers)
        $offers = [];
        foreach (Product::where('availability_id', '<>', 5)->get() as $product) {
            $offer = (new OfferSimple())
                ->setId($product->id)
                ->setAvailable(true)
                ->setUrl(url('item/' . $product->url))
                ->setPrice($product->price)
                ->setCurrencyId($product->currency)
                ->setCategoryId($product->category_id)
                ->setDelivery(true)
                ->setPickup(true)
                ->setName($product->ru_title)
                ->setDescription('<![CDATA[' .
                    preg_replace(
                        "/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",
                        '<$1$2>',
                        strip_tags($product->lang->description, '<p><b><strong><h2><h3><h4>')
                    )
                        . ']]>');
            foreach ($product->images as $image) {
                $offer->addPicture(url($image->url));
            }
            if ($product->brand_id) {
                $offer->setVendor($product->brand->title);
                $offer->setVendorCode($product->code);
            }
            if ($product->country_id) {
                $offer->setCountryOfOrigin($product->country->ru_title);
            }
            foreach ($product->properties as $property) {
                $param = new OfferParam();
                $param->setName($property->key->ru_title);
                if ($property->ru_value) {
                    $param->setValue($property->ru_value);
                }
                if ($property->unit_id) {
                    $param->setUnit($property->unit->ru_title);
                }
                $offer->addParam($param);
            }
            $offers[] = $offer;
        }

        $yml = (new Generator($settings))->generate(
            $shopInfo,
            $currencies,
            $categories,
            $offers
        );
        dd($yml);
        return view('front-side.cart.successful', ['id' => 4]);
    }
}
