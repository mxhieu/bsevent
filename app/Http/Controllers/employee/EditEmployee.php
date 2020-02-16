<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Session;
use App\Http\Requests\employee\EditEmployeeRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;
use App\Models\Department;
use App\Models\Position;
use App\Models\GroupEmployee;

class EditEmployee extends BaseAdminController
{
    /**
     * Instance of Employee model
     *
     * @var [type]
     */
    private $Employee, $Department, $Position, $GroupEmployee;

    public function __construct(Employee $Employee, Department $Department, Position $Position, GroupEmployee $GroupEmployee){
    	parent::__construct();
        $this->Employee = $Employee;
        $this->Department = $Department;
        $this->Position = $Position;
        $this->GroupEmployee = $GroupEmployee;
    }

    public function __invoke($id, EditEmployeeRequest $request)
    {
        $DepartmentList = $this->Department->getDepartMentListByStatus(0);
        $PositionList = $this->Position->getPositionListByStatus(0);
        $GroupEmployeeList = $this->GroupEmployee->getGroupEmployeeListByStatus(0);
        $data['DepartmentList'] = $DepartmentList;
        $data['PositionList'] = $PositionList;
        $data['GroupEmployeeList'] = $GroupEmployeeList;
        
        $EmployeeInfo = $this->Employee->findOrFail($id);
        $data['EmployeeInfo'] = $EmployeeInfo;
        if($request->isMethod('post'))
        {
            $this->Employee->updateEmployee($EmployeeInfo, $request->all());
            return redirect(route('employee'))->with('result',['tabactive' => 'tab1','message' => 'The employee updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('employee.index', $data);
    }
}
