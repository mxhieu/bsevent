<?php

namespace App\Http\Requests\config\company;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class EditCompanyRequest extends FormRequest
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
        $isRequireLogo = empty($this->company)?'|required':'';
        Session::flash('result', ['tabactive' => 'tab1','message' => 'Validate failed!', 'ErrorForm' => 'AddCompany']);
        return [
            'name' => 'required|max:255|min:2',
            'taxcode' => 'required|max:255|min:2',
            'address' => 'required|max:255|min:2',
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000'.$isRequireLogo.'',
            'phone' => 'required|regex:/(0)[0-9]{9}/|between:1,11',
            'email' => 'required|max:255|min:2|email',
            'homepage' => 'required|max:255|min:2',
            'intro' => 'required|max:2000|min:2',
        ];
    }
}
