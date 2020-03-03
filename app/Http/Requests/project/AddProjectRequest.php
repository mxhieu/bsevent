<?php

namespace App\Http\Requests\project;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class AddProjectRequest extends FormRequest
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
            'code' => 'required|max:255|min:2|unique:project',
            'item_group_id' => 'required',
            'task_group_id' => 'required',
            'attact_file' => 'nullable|mimes:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp|max:10000',
            'stackholder' => 'required|max:255|min:2',
            'status' => 'required',
            'in_range' => 'nullable|max:255',
            'out_range' => 'nullable|max:255',
            'remark' => 'nullable|max:255',
        ];
    }
}
