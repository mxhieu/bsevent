<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class PermissionGroupEmployee extends FormRequest
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
            return [
                'name' => 'required|max:255|min:2',
                'code' => 'required|max:255',
                'remark' => 'nullable|max:255',
            ];
        }
    }
}
