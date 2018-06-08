<?php

namespace App\Http\Controllers\Admin;

use App\Models\Availability;
use App\Models\Country;
use App\Models\ProductPropertyKey;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParametersController extends Controller
{
    /**
     * show availabilities
     * @param Availability $availability
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAvailabilities(Availability $availability)
    {
        return view('admin.parameters.availabilities', ['availabilities' => $availability->all()]);
    }

    /**
     * show countries list
     * @param Country $country
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCountries(Country $country)
    {
        return view('admin.parameters.countries', ['countries' => $country->all()]);
    }

    /**
     * show product property list
     * @param ProductPropertyKey $propertyKey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProperties(ProductPropertyKey $propertyKey)
    {
        return view('admin.parameters.properties', ['properties' => $propertyKey->all()]);
    }

    /**
     * show all units
     * @param Unit $unit
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUnits(Unit $unit)
    {
        return view('admin.parameters.units', ['units' => $unit->all()]);
    }

    /**
     * add country or availability or product property or unit
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addItem(Request $request)
    {
        $request->validate([
            'ru_title' => 'required|max:250',
            'uk_title' => 'required|max:250',
            'en_title' => 'required|max:250',
            'model' => 'required|in:Country,Availability,ProductPropertyKey,Unit'
        ]);

        $model = '\App\Models\\' . $request->model;
        $model = new $model();
        $model->ru_title = $request->ru_title;
        $model->uk_title = $request->uk_title;
        $model->en_title = $request->en_title;
        $model->save();

        return back()->with('success', 'Успешно добавлено');
    }
}
