<?php

namespace App\Http\Controllers\employee\detail\skill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeSkill;
use App\Http\Requests\employee\AddSkillRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddSkillAction extends BaseAdminController
{
    private $EmployeeSkill;

    public function __construct(EmployeeSkill $EmployeeSkill){
        parent::__construct();
        $this->EmployeeSkill = $EmployeeSkill;
    }

    public function __invoke(AddSkillRequest $request, $employeeId)
    {
        $param = $request->all();
        $param['employee_id'] = $employeeId;
        $this->EmployeeSkill->saveEmployeeSkill($param);
        return redirect(route('detailemployee',$employeeId))->with('result',['tabactive' => 'tab3','message' => 'The new skill added successfully!']);
    }
}
