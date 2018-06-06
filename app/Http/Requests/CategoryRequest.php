<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CategoryRequest extends Request
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
            'is_active' => 'boolean',
            'parent_id' => 'numeric',
            'image' => 'image|max:2000',
            'preview' => 'image|max:500'
        ];
    }
}
