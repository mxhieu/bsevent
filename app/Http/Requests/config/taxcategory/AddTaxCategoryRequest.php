<?php

namespace App\Http\Requests\config\taxcategory;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class AddTaxCategoryRequest extends FormRequest
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
        Session::flash('result', ['tabactive' => 'tab2']);
        return [
            'name' => 'required|max:255|min:2',
            'percent' => 'numeric|required|max:100|min:0',
            'remark' => 'nullable|max:255',
        ];
    }
}
