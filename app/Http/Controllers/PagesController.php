<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Product;

class PagesController extends Controller
{
    const INDEX_URL = '/';
    const CONTACTS_URL = 'contact-us';
    const FAQ_URL = 'faq';
    const DELIVERY_URL = 'delivery';
    const ARTICLES_URL = 'articles';

    /**
     * show index page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Product $product, Page $page)
    {
        $products = $product->where('is_active', 1)->orderBy('is_featured', 'desc')->limit(12)->get();
        $locale = \App::getLocale();
        $page = $page->where('url', self::INDEX_URL)->first();


        return view('index', compact('products', 'locale', 'page'));
    }

    /**
     * show contact us page
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contactUs(Page $page)
    {
        $page = $page->where('url', self::CONTACTS_URL)->first();

        return view('front-side.contact-us', compact('page'));
    }

    /**
     * show FAQs page
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFAQ(Page $page)
    {
        $page = $page->where('url', self::FAQ_URL)->first();

        return view('front-side.faq', compact('page'));
    }

    /**
     * show payment and delivery page
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delivery(Page $page)
    {
        $page = $page->where('url', self::DELIVERY_URL)->first();

        return view('front-side.delivery', compact('page'));
    }

    public function articles(Page $page)
    {
        $page = $page->where('url', self::ARTICLES_URL)->first();

        return view('front-side.articles', compact('page'));
    }

    public function test()
    {
       return view('home');
    }
}
