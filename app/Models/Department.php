<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends BaseModel
{
    protected $table = "department";

    public function ItemDepartment(){
    	return $this->hasMany('App\Models\ItemDepartment', 'department_id', 'id');
    }

    /**
     * Employee relationship
     *
     * @return  [type]  [return description]
     */
    public function Employee(){
        return $this->hasMany('App\Models\Employee', 'department_id', 'id')->where('is_deleted', 0);
    }

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of DepartMent
     */
    public function getDepartMentListByStatus($status){
        return $this->with('Employee')->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    /**
     * Save new department
     *
     * @param   array  $DataDepartment  base array from department
     *
     * @return  [type]                   [return description]
     */
    public function saveDepartment($DataDepartment){
    	$Department = new Department();
    	$DepartmentIns = $this->paramDepartment($Department, $DataDepartment);
    	$DepartmentIns->save();
    }

    /**
     * Update department
     *
     * @param   object  $InsDepartment   info of department
     * @param   array  $DataDepartment   base array of update form
     *
     * @return  [type]                   update department
     */
    public function updateDepartment($InsDepartment, $DataDepartment){
    	$DepartmentIns = $this->paramDepartment($InsDepartment, $DataDepartment);
    	$DepartmentIns->save();
    }

    /**
     * set param for add or update department
     *
     * @param   object  $DepartmentIns   instance of Department
     * @param   array  $DataDepartment   array data department
     *
     * @return  array                   convert array department
     */
    private function paramDepartment($DepartmentIns, $DataDepartment){
    	$DepartmentIns->name = $DataDepartment['name'];
        $DepartmentIns->remark = $DataDepartment['remark'];
    	return $DepartmentIns;
    }
}
