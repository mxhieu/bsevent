<?php

namespace App\Http\Controllers\employee\detail\skill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeSkill;
use App\Models\Employee;
use Session;
use App\Http\Requests\employee\EditSkillRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditSkill extends BaseAdminController
{
    /**
     * Instance of EmployeeSkill model
     *
     * @var [type]
     */
    private $EmployeeSkill, $Employee;

    public function __construct(EmployeeSkill $EmployeeSkill, Employee $Employee){
    	parent::__construct();
        $this->EmployeeSkill = $EmployeeSkill;
        $this->Employee = $Employee;
    }

    public function __invoke($employeeId, $id, EditSkillRequest $request)
    {
        $EmployeeInfo = $this->Employee->findOrFail($employeeId);
        $data['EmployeeInfo'] = $EmployeeInfo;
        
        $EmployeeSkillInfo = $this->EmployeeSkill->findOrFail($id);
        $data['EmployeeSkillInfo'] = $EmployeeSkillInfo;
        if($request->isMethod('post'))
        {
            $param = $request->all();
            $param['employee_id'] = $employeeId;
            $this->EmployeeSkill->updateEmployeeSkill($EmployeeSkillInfo, $param);
            return redirect(route('detailemployee',$employeeId))->with('result',['tabactive' => 'tab3','message' => 'The skill updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab3']);
        }
        return view('employee.detail.index', $data);
    }
}
