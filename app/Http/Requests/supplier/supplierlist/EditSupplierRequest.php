<?php

namespace App\Http\Requests\supplier\supplierlist;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class EditSupplierRequest extends FormRequest
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
            'logo' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'code' => 'required|max:255|min:2|unique:supplier,code,'.$this->id,
            'bankaccount' => 'required|max:255',
            'email' => 'required|max:255|min:2|email',
            'phone' => 'required|regex:/(0)[0-9]{9}/|between:1,11',
            'fax' => 'required|max:255|min:2',
            'address' => 'required|max:255|min:2',
            'market_id' => 'required',
            'remark' => 'nullable|max:255',
        ];
    }
}
