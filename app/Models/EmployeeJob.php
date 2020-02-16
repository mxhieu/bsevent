<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeJob extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee_job';
    
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
     * @return  collection    list collection of EmployeeJob
     */
    public function getEmployeeJobListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function getJobById($id){
        return $this->where('employee_id', $id)->where('is_deleted', 0)->orderBy('created_at','desc')->get();
    }

    public function saveEmployeeJob($DataEmployeeJob){
    	$EmployeeJob = new EmployeeJob();
    	$EmployeeJobIns = $this->setEmployeeJobInfo($EmployeeJob, $DataEmployeeJob);
    	$EmployeeJobIns->save();
    }

    /**
     * update EmployeeJob infomation
     */
    public function updateEmployeeJob($InsEmployeeJob, $DataEmployeeJob){
    	$EmployeeJobIns = $this->setEmployeeJobInfo($InsEmployeeJob, $DataEmployeeJob);
    	$EmployeeJobIns->save();
    }

    /**
     * set param for save or update
     */
    private function setEmployeeJobInfo($EmployeeJob, $EmployeeJobInfo){
        $EmployeeJob->employee_id = $EmployeeJobInfo['employee_id'];
        $EmployeeJob->company_name = $EmployeeJobInfo['company_name_job'];
        $EmployeeJob->department = $EmployeeJobInfo['department_job'];
        $EmployeeJob->position = $EmployeeJobInfo['position_job'];
        $EmployeeJob->start_at = $EmployeeJobInfo['start_at_job'];
        $EmployeeJob->end_at = $EmployeeJobInfo['end_at_job'];
        $EmployeeJob->responsibility = $EmployeeJobInfo['responsibility_job'];
        $EmployeeJob->leave = $EmployeeJobInfo['leave_job'];
        $EmployeeJob->remark = $EmployeeJobInfo['remark_job'];
    	return $EmployeeJob;
    }
}
