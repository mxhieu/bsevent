<?php

namespace App\Http\Controllers\employee\detail\job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeJob;
use App\Models\Employee;
use Session;
use App\Http\Requests\employee\EditJobRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditJob extends BaseAdminController
{
    /**
     * Instance of EmployeeJob model
     *
     * @var [type]
     */
    private $EmployeeJob, $Employee;

    public function __construct(EmployeeJob $EmployeeJob, Employee $Employee){
    	parent::__construct();
        $this->EmployeeJob = $EmployeeJob;
        $this->Employee = $Employee;
    }

    public function __invoke($employeeId, $id, EditJobRequest $request)
    {
        $EmployeeInfo = $this->Employee->findOrFail($employeeId);
        $data['EmployeeInfo'] = $EmployeeInfo;
        
        $EmployeeJobInfo = $this->EmployeeJob->findOrFail($id);
        $data['EmployeeJobInfo'] = $EmployeeJobInfo;
        if($request->isMethod('post'))
        {
            $param = $request->all();
            $param['employee_id'] = $employeeId;
            $this->EmployeeJob->updateEmployeeJob($EmployeeJobInfo, $param);
            return redirect(route('detailemployee',$employeeId))->with('result',['tabactive' => 'tab4','message' => 'The EmployeeJob updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab4']);
        }
        return view('employee.detail.index', $data);
    }
}
