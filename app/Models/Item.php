<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'item';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function ItemCategory(){
        return $this->belongsTo('App\Models\ItemCategory','itemcategory_id','id');
    }

    public function Unit(){
        return $this->belongsTo('App\Models\Unit','unit_id','id');
    }

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of Item
     */
    public function getItemListByStatus($status){
        return $this->with('ItemCategory','Unit')->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveItem($DataItem){
    	$Item = new Item();
    	$ItemIns = $this->setItemInfo($Item, $DataItem);
    	$ItemIns->save();
    }

    /**
     * update Item infomation
     */
    public function updateItem($InsItem, $DataItem){
    	$ItemIns = $this->setItemInfo($InsItem, $DataItem);
    	$ItemIns->save();
    }

    /**
     * set param for save or update
     */
    private function setItemInfo($Item, $ItemInfo){
        $Item->name = $ItemInfo['name'];
        $Item->code = $ItemInfo['code'];
        $Item->image = $ItemInfo['image'];
        $Item->unit_id = $ItemInfo['unit_id'];
        $Item->itemcategory_id = $ItemInfo['itemcategory_id'];
        $Item->lead_time = $ItemInfo['lead_time'];
        $Item->attach_file = $ItemInfo['attach_file'];
        $Item->remark = $ItemInfo['remark'];
    	return $Item;
    }

    public function getItemNotSelected($arrItemId){
        return $this->whereNotIn('id', $arrItemId)->get();
    }
}
