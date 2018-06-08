<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductParametersRequest;
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
     * @param ProductParametersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addItem(ProductParametersRequest $request)
    {
        $model = '\App\Models\\' . $request->model;
        $model = new $model();
        $model->ru_title = $request->ru_title;
        $model->uk_title = $request->uk_title;
        $model->en_title = $request->en_title;
        $model->save();

        return back()->with('success', 'Успешно добавлено');
    }

    /**
     * edit parameter item
     * @param ProductParametersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateItem(ProductParametersRequest $request)
    {
        $model = '\App\Models\\' . $request->model;
        $model = new $model();
        $model = $model::findOrFail($request->id);
        $model->ru_title = $request->ru_title;
        $model->uk_title = $request->uk_title;
        $model->en_title = $request->en_title;
        $model->save();

        return back()->with('success', 'Успешно изменено');
    }
}
