<?php

namespace App\Http\Controllers\employee\detail\job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeJob;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class JobList extends BaseAdminController
{
    public function __construct(EmployeeJob $EmployeeJob){
    	parent::__construct();
    	$this->EmployeeJob = $EmployeeJob;
    }

    public function __invoke($id)
    {
        $JobList = $this->EmployeeJob->getJobById($id);
        return Datatables::of($JobList)
        ->addColumn('action', function ($JobList) {
                return '<a href="'.route('editjob',['employeeId' => $JobList->employee_id, 'id' => $JobList->id]).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deletejob', $JobList->id).'" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
