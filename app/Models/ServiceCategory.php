<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'servicecategory';
    
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
     * @return  collection    list collection of ServiceCategory
     */
    public function getServiceCategoryListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveServiceCategory($DataServiceCategory){
    	$ServiceCategory = new ServiceCategory();
    	$ServiceCategoryIns = $this->setServiceCategoryInfo($ServiceCategory, $DataServiceCategory);
    	$ServiceCategoryIns->save();
    }

    /**
     * update ServiceCategory infomation
     */
    public function updateServiceCategory($InsServiceCategory, $DataServiceCategory){
    	$ServiceCategoryIns = $this->setServiceCategoryInfo($InsServiceCategory, $DataServiceCategory);
    	$ServiceCategoryIns->save();
    }

    /**
     * set param for save or update
     */
    private function setServiceCategoryInfo($ServiceCategory, $ServiceCategoryInfo){
        $ServiceCategory->name = $ServiceCategoryInfo['name'];
        $ServiceCategory->remark = $ServiceCategoryInfo['remark'];
    	return $ServiceCategory;
    }
}
