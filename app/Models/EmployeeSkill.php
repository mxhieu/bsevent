<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeSkill extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee_skill';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of EmployeeSkill
     */
    public function getEmployeeSkillListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function getJobById($id){
        return $this->where('employee_id', $id)->where('is_deleted', 0)->orderBy('created_at','desc')->get();
    }

    public function saveEmployeeSkill($DataEmployeeSkill){
    	$EmployeeSkill = new EmployeeSkill();
    	$EmployeeSkillIns = $this->setEmployeeSkillInfo($EmployeeSkill, $DataEmployeeSkill);
    	$EmployeeSkillIns->save();
    }

    /**
     * update EmployeeSkill infomation
     */
    public function updateEmployeeSkill($InsEmployeeSkill, $DataEmployeeSkill){
    	$EmployeeSkillIns = $this->setEmployeeSkillInfo($InsEmployeeSkill, $DataEmployeeSkill);
    	$EmployeeSkillIns->save();
    }

    /**
     * set param for save or update
     */
    private function setEmployeeSkillInfo($EmployeeSkill, $EmployeeSkillInfo){
        $EmployeeSkill->employee_id = $EmployeeSkillInfo['employee_id'];
        $EmployeeSkill->name = $EmployeeSkillInfo['name_skill'];
        $EmployeeSkill->level = $EmployeeSkillInfo['level_skill'];
        $EmployeeSkill->certificate = $EmployeeSkillInfo['certificate_skill'];
        $EmployeeSkill->remark = $EmployeeSkillInfo['remark_skill'];
    	return $EmployeeSkill;
    }
}
