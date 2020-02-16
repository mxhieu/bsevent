<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class EditJobRequest extends FormRequest
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
            Session::flash('result', ['tabactive' => 'tab4','ErrorForm'=> 'job']);
            return [
                'company_name_job' => 'required|max:255|min:2',
                'department_job' => 'required|max:255|min:2',
                'position_job' => 'required|max:255|min:2',
                'start_at_job' => 'required|max:255|min:2',
                'end_at_job' => 'required|max:255|min:2',
                'responsibility_job' => 'nullable|max:255|min:2',
                'leave_job' => 'nullable|max:255|min:2',
                'remark_job' => 'nullable|max:255|min:2',
            ];
        }
        return [];
    }
}
