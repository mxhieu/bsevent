<?php

namespace App\Http\Controllers\employee\detail\job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeJob;
use App\Http\Requests\employee\AddJobRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddJobAction extends BaseAdminController
{
    private $EmployeeJob;

    public function __construct(EmployeeJob $EmployeeJob){
        parent::__construct();
        $this->EmployeeJob = $EmployeeJob;
    }

    public function __invoke(AddJobRequest $request, $employeeId)
    {
        $param = $request->all();
        $param['employee_id'] = $employeeId;
        $this->EmployeeJob->saveEmployeeJob($param);
        return redirect(route('detailemployee',$employeeId))->with('result',['tabactive' => 'tab4','message' => 'The new job added successfully!']);
    }
}
