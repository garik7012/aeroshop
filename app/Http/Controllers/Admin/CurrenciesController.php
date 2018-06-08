<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrenciesController extends Controller
{
    /**
     * show currencies
     * @param Currency $currency
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Currency $currency)
    {
        return view('admin.currencies.all', ['currencies' => $currency->all()]);
    }

    /**
     * change currency rate
     * @param Request $request
     * @param Currency $currency
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeRate(Request $request, Currency $currency)
    {
        $request->validate(['rate' => 'numeric']);
        $currency = $currency->where('code', $request->code)->firstOrFail();
        $currency->rate = $request->rate;
        $currency->save();

        return back()->with('success', 'Курс успешно изменен');
    }

    /**
     * add currency
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCurrency(Request $request)
    {
        $request->validate(['code' => 'required|unique:currencies', 'rate' => 'required|numeric']);
        $currency = new Currency();
        $currency->code = $request->code;
        $currency->rate = $request->rate;
        $currency->save();

        return back()->with('success', 'Валюта успешно добавлена');
    }
}
