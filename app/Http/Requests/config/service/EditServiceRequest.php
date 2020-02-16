<?php

namespace App\Http\Requests\config\service;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class EditServiceRequest extends FormRequest
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
                'name' => 'required|max:255|min:2',
                'servicecategory_id' => 'required|max:255|min:0|numeric',
                'code' => 'required|max:255|min:2|unique:service,code,'.$this->id,
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'unit_id' => 'required|max:255|min:0|numeric',
                'lead_time' => 'required|max:1000|min:2|numeric',
                'attach_file' => 'nullable|file|mimes:xlsx,xls,csv,jpg,jpeg,png,bmp,doc,docx,pdf,tif,tiff',
                'remark' => 'nullable|max:255',
            ];
        }
        return [];
    }
}
