<?php

namespace App\Http\Controllers\employee\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GroupEmployee;
use Session;
use App\Http\Requests\config\GroupEmployee\EditGroupEmployeeRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditEmployeeGroup extends BaseAdminController
{
    /**
     * Instance of GroupEmployee model
     *
     * @var [type]
     */
    private $GroupEmployee;

    public function __construct(GroupEmployee $GroupEmployee){
    	parent::__construct();
    	$this->GroupEmployee = $GroupEmployee;
    }

    public function __invoke($id, Request $request)
    {
        $GroupEmployeeInfo = $this->GroupEmployee->findOrFail($id);
        $data['GroupEmployeeInfo'] = $GroupEmployeeInfo;
        if($request->isMethod('post'))
        {
            $this->GroupEmployee->updateGroupEmployee($GroupEmployeeInfo, $request->all());
            return redirect(route('employeegroup'))->with('result',['tabactive' => 'tab1','message' => 'The GroupEmployee updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('employee.group.index', $data);
    }
}
