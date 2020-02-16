<?php

namespace App\Http\Controllers\config\department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DepartmentList extends BaseAdminController
{
    public function __construct(Department $Department){
    	parent::__construct();
    	$this->Department = $Department;
    }

    public function __invoke(Request $request)
    {
        $DepartmentList = $this->Department->getDepartMentListByStatus(0);
        foreach($DepartmentList as $row)
        {
            $row->member = $row->Employee->count();
        }
        return Datatables::of($DepartmentList)
        ->addColumn('action', function ($DepartmentList) {
                return '<a href="'.route('departmentmember', $DepartmentList->id).'" class="btn btn-info">Member</a>
                <a href="'.route('itemgroupview', $DepartmentList->id).'" class="btn btn-success">Nhóm hạng mục</a>
                <a href="'.route('editdepartment', $DepartmentList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deletedepartment', $DepartmentList->id).'" class="btn btn-danger delete_confirm"> Delete</a>
            ';
        })
        ->make(true);
    }   
}
