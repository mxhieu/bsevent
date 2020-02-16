<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'itemcategory';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function Items(){
        return $this->hasMany('App\Models\Item', 'itemcategory_id', 'id');
    }

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of ItemCategory
     */
    public function getItemCategoryListByStatus($status){
        return $this->with('Items')->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveItemCategory($DataItemCategory){
    	$ItemCategory = new ItemCategory();
    	$ItemCategoryIns = $this->setItemCategoryInfo($ItemCategory, $DataItemCategory);
    	$ItemCategoryIns->save();
    }

    /**
     * update ItemCategory infomation
     */
    public function updateItemCategory($InsItemCategory, $DataItemCategory){
    	$ItemCategoryIns = $this->setItemCategoryInfo($InsItemCategory, $DataItemCategory);
    	$ItemCategoryIns->save();
    }

    /**
     * set param for save or update
     */
    private function setItemCategoryInfo($ItemCategory, $ItemCategoryInfo){
        $ItemCategory->name = $ItemCategoryInfo['name'];
        $ItemCategory->remark = $ItemCategoryInfo['remark'];
    	return $ItemCategory;
    }
}
