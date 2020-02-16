<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseAdminController as BaseAdminController;
use App\Models\Department;
use App\Models\Position;
use App\Models\GroupEmployee;

class EmployeeView extends BaseAdminController
{

    private $Department, $Position, $GroupEmployee;

    public function __construct(Department $Department, Position $Position, GroupEmployee $GroupEmployee){
        parent::__construct();
        $this->Department = $Department;
        $this->Position = $Position;
        $this->GroupEmployee = $GroupEmployee;
    }

    public function __invoke(Request $request)
    {
        $DepartmentList = $this->Department->getDepartMentListByStatus(0);
        $PositionList = $this->Position->getPositionListByStatus(0);
        $GroupEmployeeList = $this->GroupEmployee->getGroupEmployeeListByStatus(0);
        $data['DepartmentList'] = $DepartmentList;
        $data['PositionList'] = $PositionList;
        $data['GroupEmployeeList'] = $GroupEmployeeList;
        return view('employee.index', $data);
    }
}
