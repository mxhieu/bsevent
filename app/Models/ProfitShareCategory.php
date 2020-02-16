<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfitShareCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profitsharecategory';
    
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
     * @return  collection    list collection of ProfitShareCategory
     */
    public function getProfitShareCategoryListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveProfitShareCategory($DataProfitShareCategory){
    	$ProfitShareCategory = new ProfitShareCategory();
    	$ProfitShareCategoryIns = $this->setProfitShareCategoryInfo($ProfitShareCategory, $DataProfitShareCategory);
    	$ProfitShareCategoryIns->save();
    }

    /**
     * update ProfitShareCategory infomation
     */
    public function updateProfitShareCategory($InsProfitShareCategory, $DataProfitShareCategory){
    	$ProfitShareCategoryIns = $this->setProfitShareCategoryInfo($InsProfitShareCategory, $DataProfitShareCategory);
    	$ProfitShareCategoryIns->save();
    }

    /**
     * set param for save or update
     */
    private function setProfitShareCategoryInfo($ProfitShareCategory, $ProfitShareCategoryInfo){
        $ProfitShareCategory->name = $ProfitShareCategoryInfo['name'];
        $ProfitShareCategory->remark = $ProfitShareCategoryInfo['remark'];
    	return $ProfitShareCategory;
    }
}
