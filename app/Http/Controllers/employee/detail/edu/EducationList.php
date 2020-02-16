<?php

namespace App\Http\Controllers\employee\detail\edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeEducation;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EducationList extends BaseAdminController
{
    public function __construct(EmployeeEducation $EmployeeEducation){
    	parent::__construct();
    	$this->EmployeeEducation = $EmployeeEducation;
    }

    public function __invoke($id)
    {
        $EmployeeEducationList = $this->EmployeeEducation->getEdutcationById($id);
        return Datatables::of($EmployeeEducationList)
        ->addColumn('action', function ($EmployeeEducationList) {
                return '<a href="'.route('editeducation',['employeeId' => $EmployeeEducationList->employee_id,'id' => $EmployeeEducationList->id]).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleteedu',$EmployeeEducationList->id).'" class="btn btn-danger delete_confirm"> Delete</a>
            ';
        })
        ->make(true);
    }
}
