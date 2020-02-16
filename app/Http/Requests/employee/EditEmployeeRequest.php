<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class EditEmployeeRequest extends FormRequest
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
                'name' => 'required|max:255|min:1',
                'approve' => 'required|max:255|min:-1|numeric',
                'email' => 'required|max:255|min:2|unique:employee,email,'.$this->id,
                'password' => 'nullable|max:255|min:5',
                'department_id' => 'required|max:100000|min:0|numeric',
                'position_id' => 'required|max:100000|min:0|numeric',
                'groupemployee_id' => 'required|max:100000|min:0|numeric',
            ];
        }
        return [];
    }
}
