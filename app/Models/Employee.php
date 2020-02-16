<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee';

    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Department relationship
     *
     * @return  [type]  [return description]
     */
    public function Department(){
        return $this->belongsTo('App\Models\Department','department_id','id');
    }

    /**
     * Position relationship
     *
     * @return  [type]  [return description]
     */
    public function Position(){
        return $this->belongsTo('App\Models\Position','position_id','id');
    }

    /**
     * GroupEmployee relationship
     *
     * @return  [type]  [return description]
     */
    public function GroupEmployee(){
        return $this->belongsTo('App\Models\GroupEmployee','groupemployee_id','id');
    }

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of Employee
     */
    public function getEmployeeListByStatus($status){
        return $this->with(['Department', 'Position', 'GroupEmployee'])->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function getEmployeeByGroup($id)
    {
        return $this->with(['Department', 'Position', 'GroupEmployee'])->where('groupemployee_id', $id)->where('is_deleted', 0)->orderBy('created_at','desc')->get();
    }

    public function getEmployeeByDepartment($id)
    {
        return $this->with(['Department', 'Position', 'GroupEmployee'])->where('department_id', $id)->where('is_deleted', 0)->orderBy('created_at','desc')->get();
    }

    public function saveEmployee($DataEmployee){
    	$Employee = new Employee();
    	$EmployeeIns = $this->setEmployeeInfo($Employee, $DataEmployee);
    	$EmployeeIns->save();
    }

    /**
     * update Employee infomation
     */
    public function updateEmployee($InsEmployee, $DataEmployee, $Detail = false){
        if($Detail){
            $EmployeeIns = $this->setEmployeeDetailInfo($InsEmployee, $DataEmployee);
        }
        else
            $EmployeeIns = $this->setEmployeeInfo($InsEmployee, $DataEmployee);
    	$EmployeeIns->save();
    }

    /**
     * set param for save or update
     */
    private function setEmployeeInfo($Employee, $EmployeeInfo){
        $Employee->name = $EmployeeInfo['name'];
        $Employee->approve = $EmployeeInfo['approve'];
        $Employee->email = $EmployeeInfo['email'];
        $Employee->department_id = $EmployeeInfo['department_id'];
        $Employee->position_id = $EmployeeInfo['position_id'];
        $Employee->groupemployee_id = $EmployeeInfo['groupemployee_id'];
        $Employee->password = bcrypt($EmployeeInfo['password']);
    	return $Employee;
    }

    private function setEmployeeDetailInfo($Employee, $EmployeeInfo){
        $Employee->country = $EmployeeInfo['country'];
        $Employee->birthday = $EmployeeInfo['birthday'];
        $Employee->gender = $EmployeeInfo['gender'];
        $Employee->marital_status = $EmployeeInfo['marital_status'];
        $Employee->phone = $EmployeeInfo['phone'];
        $Employee->remark = $EmployeeInfo['remark'];
        return $Employee;
    }
}
