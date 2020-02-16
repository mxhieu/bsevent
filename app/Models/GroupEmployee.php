<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupEmployee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groupemployee';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function Employee(){
        return $this->hasMany('App\Models\Employee','groupemployee_id','id')->where('is_deleted', 0);
    }

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of GroupEmployee
     */
    public function getGroupEmployeeListByStatus($status){
        return $this->with('Employee')->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveGroupEmployee($DataGroupEmployee){
    	$GroupEmployee = new GroupEmployee();
    	$GroupEmployeeIns = $this->setGroupEmployeeInfo($GroupEmployee, $DataGroupEmployee);
    	$GroupEmployeeIns->save();
    }

    /**
     * update GroupEmployee infomation
     */
    public function updateGroupEmployee($InsGroupEmployee, $DataGroupEmployee){
    	$GroupEmployeeIns = $this->setGroupEmployeeInfo($InsGroupEmployee, $DataGroupEmployee);
    	$GroupEmployeeIns->save();
    }

    /**
     * set param for save or update
     */
    private function setGroupEmployeeInfo($GroupEmployee, $GroupEmployeeInfo){
        $GroupEmployee->name = $GroupEmployeeInfo['name'];
        $GroupEmployee->remark = $GroupEmployeeInfo['remark'];
    	return $GroupEmployee;
    }
}
