<?php

namespace App\Http\Controllers\employee\detail\skill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeSkill;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteSkill extends BaseAdminController
{
    private $EmployeeSkill;

    public function __construct(EmployeeSkill $EmployeeSkill)
    {
        parent::__construct();
        $this->EmployeeSkill = $EmployeeSkill;
    }

    /**
     * Soft delete company representatives
     *
     * @param   int  $id  id of company representatives
     *
     * @return  [type]       redirect to company view
     */
    public function __invoke($id)
    {
        $EmployeeSkillInfo = $this->EmployeeSkill->findOrFail($id);
        $EmployeeSkillInfo->is_deleted = 1;
        $EmployeeSkillInfo->save();
        return redirect(route('detailemployee',$EmployeeSkillInfo->employee_id))->with('result', ['tabactive' => 'tab3','message' => 'The job deleted successfully!']);
    }
}
