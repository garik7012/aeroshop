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
        dd(ProductPageLang::where('locale', 'ru')->where('description', 'like', '%' . 'www.youtube.com/' . '%')->pluck('description', 'id')->toArray());
        return view('front-side.cart.successful', ['id' => 4]);
    }
}
