<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class EditEducationRequest extends FormRequest
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
            Session::flash('result', ['tabactive' => 'tab2','ErrorForm'=> 'education']);
            return [
                'school_edu' => 'required|max:255|min:2',
                'majors_edu' => 'required|max:255|min:2',
                'level_edu' => 'required|max:255|min:2',
                'certificate_edu' => 'nullable|max:255|min:2',
                'start_at_edu' => 'required|max:255|min:2',
                'end_at_edu' => 'required|max:255|min:2',
                'remark_edu' => 'nullable|max:255|min:2',
            ];
        }
        return [];
    }
}
