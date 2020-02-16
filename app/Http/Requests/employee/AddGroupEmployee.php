<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class AddGroupEmployee extends FormRequest
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
            'status' => 'required|numeric',
            'remark' => 'nullable|max:255',
        ];
    }
}
