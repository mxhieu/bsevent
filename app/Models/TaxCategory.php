<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'taxcategory';
    
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
     * @return  collection    list collection of TaxCategory
     */
    public function getTaxCategoryListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveTaxCategory($DataTaxCategory){
    	$TaxCategory = new TaxCategory();
    	$TaxCategoryIns = $this->setTaxCategoryInfo($TaxCategory, $DataTaxCategory);
    	$TaxCategoryIns->save();
    }

    /**
     * update TaxCategory infomation
     */
    public function updateTaxCategory($InsTaxCategory, $DataTaxCategory){
    	$TaxCategoryIns = $this->setTaxCategoryInfo($InsTaxCategory, $DataTaxCategory);
    	$TaxCategoryIns->save();
    }

    /**
     * set param for save or update
     */
    private function setTaxCategoryInfo($TaxCategory, $TaxCategoryInfo){
        $TaxCategory->name = $TaxCategoryInfo['name'];
        $TaxCategory->percent = $TaxCategoryInfo['percent'];
        $TaxCategory->remark = $TaxCategoryInfo['remark'];
    	return $TaxCategory;
    }
}
