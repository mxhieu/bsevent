<?php

namespace App\Http\Requests\config\suppliercategory;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class EditSupplierCategoryRequest extends FormRequest
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
        if($this->isMethod('post'))
        {
            Session::flash('result', ['tabactive' => 'tab2']);
            return [
                'name' => 'required|max:255|min:2',
                'remark' => 'nullable|max:255',
            ];
        }
        return [];
    }
}
