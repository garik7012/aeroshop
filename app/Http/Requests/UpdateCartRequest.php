<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateCartRequest extends Request
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
        $rules = [];
        foreach ($this->request->get('cart_quantity') as $key => $val) {
            $rules['cart_quantity.'.$key] = 'required|numeric|min:1|max:9999';
        }

        return $rules;
    }
}
