<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class AddSkillRequest extends FormRequest
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
        Session::flash('result', ['tabactive' => 'tab3','ErrorForm'=> 'skill']);
        return [
            'name_skill' => 'required|max:255|min:2',
            'level_skill' => 'nullable|max:255|min:2',
            'certificate_skill' => 'nullable|max:255|min:2',
            'remark_skill' => 'nullable|max:255|min:2',
        ];
    }
}
