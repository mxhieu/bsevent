<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class EmployeeDetailRequest extends FormRequest
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
            Session::flash('result', ['tabactive' => 'tab1','ErrorForm'=> 'detail']);
            return [
                'country' => 'nullable|max:255|min:1',
                'birthday' => 'nullable|max:255|min:1',
                'gender' => 'nullable|between:0,2|numeric',
                'marital_status' => 'nullable|between:0,2|numeric',
                'phone' => 'nullable|regex:/(0)[0-9]{9}/',
                'remark' => 'nullable|max:255|min:2',
            ];
        }
        return [];
    }
}
