<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeEducation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee_education';
    
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
     * @return  collection    list collection of EmployeeEducation
     */
    public function getEmployeeEducationListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function getEdutcationById($id){
        return $this->where('employee_id', $id)->where('is_deleted', 0)->orderBy('created_at','desc')->get();
    }

    public function saveEmployeeEducation($DataEmployeeEducation){
    	$EmployeeEducation = new EmployeeEducation();
    	$EmployeeEducationIns = $this->setEmployeeEducationInfo($EmployeeEducation, $DataEmployeeEducation);
    	$EmployeeEducationIns->save();
    }

    /**
     * update EmployeeEducation infomation
     */
    public function updateEmployeeEducation($InsEmployeeEducation, $DataEmployeeEducation){
    	$EmployeeEducationIns = $this->setEmployeeEducationInfo($InsEmployeeEducation, $DataEmployeeEducation);
    	$EmployeeEducationIns->save();
    }

    /**
     * set param for save or update
     */
    private function setEmployeeEducationInfo($EmployeeEducation, $EmployeeEducationInfo){
        $EmployeeEducation->employee_id = $EmployeeEducationInfo['employee_id'];
        $EmployeeEducation->school = $EmployeeEducationInfo['school_edu'];
        $EmployeeEducation->majors = $EmployeeEducationInfo['majors_edu'];
        $EmployeeEducation->level = $EmployeeEducationInfo['level_edu'];
        $EmployeeEducation->certificate = $EmployeeEducationInfo['certificate_edu'];
        $EmployeeEducation->start_at = $EmployeeEducationInfo['start_at_edu'];
        $EmployeeEducation->end_at = $EmployeeEducationInfo['end_at_edu'];
        $EmployeeEducation->remark = $EmployeeEducationInfo['remark_edu'];
    	return $EmployeeEducation;
    }
}
