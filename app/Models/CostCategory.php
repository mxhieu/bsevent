<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'costcategory';
    
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
     * @return  collection    list collection of CostCategory
     */
    public function getCostCategoryListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveCostCategory($DataCostCategory){
    	$CostCategory = new CostCategory();
    	$CostCategoryIns = $this->setCostCategoryInfo($CostCategory, $DataCostCategory);
    	$CostCategoryIns->save();
    }

    /**
     * update CostCategory infomation
     */
    public function updateCostCategory($InsCostCategory, $DataCostCategory){
    	$CostCategoryIns = $this->setCostCategoryInfo($InsCostCategory, $DataCostCategory);
    	$CostCategoryIns->save();
    }

    /**
     * set param for save or update
     */
    private function setCostCategoryInfo($CostCategory, $CostCategoryInfo){
        $CostCategory->name = $CostCategoryInfo['name'];
        $CostCategory->remark = $CostCategoryInfo['remark'];
    	return $CostCategory;
    }
}
