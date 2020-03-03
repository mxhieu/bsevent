<?php

namespace App\Http\Requests\supplier\requestform;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class AddRequestFormRequest extends FormRequest
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
            'code' => 'required|max:255|min:2|unique:requestform',
            // 'project_id ' => 'required',
            'deadline' => 'required|max:255|min:2',
            'employee_id' => 'required',
            'status' => 'required',
            'remark' => 'nullable|max:255',
        ];
    }
}
