<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class ContactUsRequest extends Request
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
            'email' => 'required|email|max:250',
            'message' => 'required|min:5|max:5000',
        ];
    }
}
