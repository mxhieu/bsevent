<?php

namespace App\Http\Requests\config\company;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class AddCompanyRepresentativesRequest extends FormRequest
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
        Session::flash('result', ['tabactive' => 'tab2','message' => 'Validate failed!', 'ErrorForm' => 'AddCompanyRepresentatives']);
        return [
            'representatives_name' => 'required|max:255|min:2',
            'representatives_taxcode' => 'required|max:255|min:2',
            'representatives_address' => 'required|max:255|min:2',
            'representatives_phone' => 'required|regex:/(0)[0-9]{9}/|between:1,11',
            'representatives_email' => 'required|max:255|min:2|email',
        ];
    }

    
}
