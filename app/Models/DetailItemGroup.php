<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailItemGroup extends Model
{
    protected $table = "detail_item_group";
    
    protected $fillable = ["detail_item_group_category_id","item_id"];

    protected $primaryKey = ['detail_item_group_category_id', 'item_id'];

    public $incrementing = false;

    public function getItemListByCategoryId($CategoryId){
        return $this->where('detail_item_group_category_id', $CategoryId)->pluck('item_id');
    } 

    public function DeleteDetailItemGroup($ItemId, $CateId){
        return $this->where('detail_item_group_category_id', $CateId)->where('item_id', $ItemId)->delete();
    }
}
