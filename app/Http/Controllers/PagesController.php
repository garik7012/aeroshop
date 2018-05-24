<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class PagesController extends Controller
{
    /**
     * show index page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    public function test()
    {
        $products = $this->getArr();
        $need = [];
        foreach ($products as $product) {
            if (!in_array($product, $need)) {
                $need[] = $product;
            }
        }
        var_export($need);
    }

    public function getArr()
    {
        return [];
    }
}
