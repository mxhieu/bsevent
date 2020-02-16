<?php

namespace App\Http\Controllers\employee\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Position;
use App\Models\GroupEmployee;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EmployeeMember extends BaseAdminController
{
    private $Department, $Position, $GroupEmployee;

    public function __construct(Department $Department, Position $Position, GroupEmployee $GroupEmployee){
        parent::__construct();
        $this->Department = $Department;
        $this->Position = $Position;
        $this->GroupEmployee = $GroupEmployee;
    }

    public function __invoke($id)
    {
        $MemberGroupInfo = $this->GroupEmployee->findOrFail($id);
        $DepartmentList = $this->Department->getDepartMentListByStatus(0);
        $PositionList = $this->Position->getPositionListByStatus(0);
        $GroupEmployeeList = $this->GroupEmployee->getGroupEmployeeListByStatus(0);
        $data['DepartmentList'] = $DepartmentList;
        $data['PositionList'] = $PositionList;
        $data['GroupEmployeeList'] = $GroupEmployeeList;
        $data['MemberGroupInfo'] = $MemberGroupInfo;
        return view('employee.group.member', $data);
    }
}
