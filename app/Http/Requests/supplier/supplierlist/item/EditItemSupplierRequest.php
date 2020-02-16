<?php

namespace App\Http\Requests\supplier\supplierlist\item;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class EditItemSupplierRequest extends FormRequest
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
            // 'supplier_id' => 'required|numeric',
            'name' => 'required|max:255|min:2',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'code' => 'required|max:255|min:2|unique:item_supplier,code,'.$this->itemId,
            'item_id' => 'required',
            'min_price' => 'required|min:0|max:100000000000',
            'max_price' => 'required|min:0|max:100000000000',
            'discount' => 'required|min:0|max:100',
            'attact_file' => 'nullable|mimes:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp|max:10000',
            'min_capacity' => 'required|min:0|max:1000000000',
            'max_capacity' => 'required|min:0|max:1000000000',
            'unit_capacity' => 'required',
            'preparation_time' => 'required|min:0|max:10000',
            'status' => 'required',
            'remark' => 'nullable|max:255',
        ];
    }
}
