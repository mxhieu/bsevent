<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevenueCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'RevenueCategory';
    
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
     * @return  collection    list collection of RevenueCategory
     */
    public function getRevenueCategoryListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveRevenueCategory($DataRevenueCategory){
    	$RevenueCategory = new RevenueCategory();
    	$RevenueCategoryIns = $this->setRevenueCategoryInfo($RevenueCategory, $DataRevenueCategory);
    	$RevenueCategoryIns->save();
    }

    /**
     * update RevenueCategory infomation
     */
    public function updateRevenueCategory($InsRevenueCategory, $DataRevenueCategory){
    	$RevenueCategoryIns = $this->setRevenueCategoryInfo($InsRevenueCategory, $DataRevenueCategory);
    	$RevenueCategoryIns->save();
    }

    /**
     * set param for save or update
     */
    private function setRevenueCategoryInfo($RevenueCategory, $RevenueCategoryInfo){
        $RevenueCategory->name = $RevenueCategoryInfo['name'];
        $RevenueCategory->remark = $RevenueCategoryInfo['remark'];
    	return $RevenueCategory;
    }
}
