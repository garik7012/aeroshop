<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class ProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ru_title' => 'required|max:250|min:3',
            'en_title' => 'required|max:250|min:3',
            'uk_title' => 'required|max:250|min:3',
            'price' => 'numeric',
            'currency' => 'required|in:UAH,USD,GBP,EUR,JPY',
            'unit_id' => 'required',
            'availability_id' => 'required|numeric',
            'youtube' => 'max:255',
            'code' => 'max:255',
            'category_id' => 'required|numeric',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }
}
