<?php

namespace App\Http\Controllers\employee\detail\edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeEducation;
use App\Models\Employee;
use Session;
use App\Http\Requests\employee\EditEducationRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditEducation extends BaseAdminController
{
    /**
     * Instance of EmployeeEducation model
     *
     * @var [type]
     */
    private $EmployeeEducation, $Employee;

    public function __construct(EmployeeEducation $EmployeeEducation, Employee $Employee){
    	parent::__construct();
        $this->EmployeeEducation = $EmployeeEducation;
        $this->Employee = $Employee;
    }

    public function __invoke($employeeId, $id, EditEducationRequest $request)
    {
        $EmployeeInfo = $this->Employee->findOrFail($employeeId);
        $data['EmployeeInfo'] = $EmployeeInfo;
        
        $EmployeeEducationInfo = $this->EmployeeEducation->findOrFail($id);
        $data['EmployeeEducationInfo'] = $EmployeeEducationInfo;
        if($request->isMethod('post'))
        {
            $param = $request->all();
            $param['employee_id'] = $employeeId;
            $this->EmployeeEducation->updateEmployeeEducation($EmployeeEducationInfo, $param);
            return redirect(route('detailemployee',$employeeId))->with('result',['tabactive' => 'tab2','message' => 'The EmployeeEducation updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('employee.detail.index', $data);
    }
}
