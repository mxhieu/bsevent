<?php

namespace App\Http\Controllers\employee\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GroupEmployee;
use App\Http\Requests\employee\AddGroupEmployee;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EmployeePermission extends BaseAdminController
{
    private $GroupEmployee;

    public function __construct(GroupEmployee $GroupEmployee){
        parent::__construct();
        $this->GroupEmployee = $GroupEmployee;
    }

    public function __invoke($id,Request $request)
    {
        $GroupEmployeeInfo = $this->GroupEmployee->findOrFail($id);
        if($request->isMethod('post'))
        {
            return redirect(route('employeegroup'))->with('result',['tabactive' => 'tab1','message' => 'The new group added successfully!']);
        }
        $PermissionList = config('baseconfig')['EmployeePermission'];
        $data['PermissionList'] = $PermissionList;
        return view('employee.group.permission', $data);        
    }
}
