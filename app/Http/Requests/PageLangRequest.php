<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class PageLangRequest extends Request
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
            'title' => 'required|max:250|min:3',
            'seo_title' => 'max:250',
            'seo_description' => 'max:250',
            'keywords' => 'max:250'
        ];
    }
}
