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
        $arr = $this->getArr();
        $brands = [];
        foreach ($arr as $item) {
            if (!in_array($item[24], $brands)) {
                $brands[] = $item[24];
            }
        }
        var_export($brands);
    }

    public function getArr()
    {
        return [];
    }
}
