<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EmployeeList extends BaseAdminController
{
    public function __construct(Employee $Employee){
    	parent::__construct();
    	$this->Employee = $Employee;
    }

    public function __invoke()
    {
        $EmployeeList = $this->Employee->getEmployeeListByStatus(0);
        foreach($EmployeeList as $row)
        {
            $row->approve = $row->approve == 0?'Cấp phép':'Không cấp phép';
        }
        return Datatables::of($EmployeeList)
        ->addColumn('action', function ($EmployeeList) {
                return '<a class="btn bg-purple" style="color: white" href="'.route('editemployee', $EmployeeList->id).'">Cập nhật</a>
                <a class="btn bg-success" style="color: white" href="'.route('detailemployee', $EmployeeList->id).'">Chi tiết</a>
                <a class="btn bg-danger delete_confirm" style="color: white" href="'.route('deleteemployee', $EmployeeList->id).'">Xóa</a>
                ';
        })
        ->make(true);
    }
}
