<?php

namespace App\Http\Controllers\employee\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GroupEmployee;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class GroupEmployeeList extends BaseAdminController
{
    public function __construct(GroupEmployee $GroupEmployee){
    	parent::__construct();
    	$this->GroupEmployee = $GroupEmployee;
    }

    public function __invoke()
    {
        $GroupEmployeeList = $this->GroupEmployee->getGroupEmployeeListByStatus(0);
        foreach($GroupEmployeeList as $row)
        {
            $row->member = $row->Employee->count();
            $row->status = $row->status == 1?'Hoạt động':'Không HĐ';
        }
        return Datatables::of($GroupEmployeeList)
        ->addColumn('action', function ($GroupEmployeeList) {
                return '<a class="btn bg-purple" style="color: white" href="'.route('membergroup', $GroupEmployeeList->id).'">Member</a>
                    <a class="btn bg-info" style="color: white" href="'.route('employeepermission',$GroupEmployeeList->id).'">Quyền</a>
                    <a class="btn bg-success" style="color: white" href="'.route('editgroup',$GroupEmployeeList->id).'">Edit</a>
                    <a class="btn bg-danger delete_confirm" style="color: white" href="'.route('deletegroup', $GroupEmployeeList->id).'">Delete</a>
                ';
        })
        ->make(true);
    }
}
