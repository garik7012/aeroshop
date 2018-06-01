<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class OrderRequest extends Request
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
            'name' => 'required|max:250|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:5|max:50',
            'delivery_option' => 'in:1,2',
            'delivery' => 'required'
        ];
    }
}
