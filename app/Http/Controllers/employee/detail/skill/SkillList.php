<?php

namespace App\Http\Controllers\employee\detail\skill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeSkill;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class SkillList extends BaseAdminController
{
    public function __construct(EmployeeSkill $EmployeeSkill){
    	parent::__construct();
    	$this->EmployeeSkill = $EmployeeSkill;
    }

    public function __invoke($id)
    {
        $SkillList = $this->EmployeeSkill->getJobById($id);
        return Datatables::of($SkillList)
        ->addColumn('action', function ($SkillList) {
                return '<a href="'.route('editskill',['employeeId' => $SkillList->employee_id, 'id' => $SkillList->id]).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleteskill', $SkillList->id).'" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
