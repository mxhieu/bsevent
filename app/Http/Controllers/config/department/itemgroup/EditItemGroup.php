<?php

namespace App\Http\Controllers\config\department\itemgroup;

use Illuminate\Http\Request;
use App\Models\ItemGroup;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\config\department\itemgroup\EditItemGroupRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;
use Session;

class EditItemGroup extends BaseAdminController
{
    /**
     * Instance of ItemGroup model
     *
     * @var [type]
     */
    private $ItemGroup;

    public function __construct(ItemGroup $ItemGroup, Department $Department){
    	parent::__construct();
        $this->ItemGroup = $ItemGroup;
        $this->Department = $Department;
    }

    public function __invoke($id, EditItemGroupRequest $request)
    {
        $ItemGroupInfo = $this->ItemGroup->findOrFail($id);
        $departmentInfo = $this->Department->find($ItemGroupInfo->department_id);
        if($request->isMethod('post'))
        {
            $param = $request->all();
            $param['department_id'] = $departmentInfo->id;
            $ItemGroupInfo->fill($param);
            $ItemGroupInfo->save();
            return redirect(route('itemgroupview', $departmentInfo->id))->with('result',['tabactive' => 'tab1','message' => 'The group updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        $data = [
            'departmentInfo' => $departmentInfo,
            'ItemGroupInfo' => $ItemGroupInfo
        ];
        return view('config.department.itemgroup.index', $data);
    }
}
