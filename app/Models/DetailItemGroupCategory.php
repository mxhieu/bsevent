<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailItemGroupCategory extends Model
{
    protected $table = "detail_item_group_category";
    
    protected $fillable = ["item_group_id","name","remark"];

    public function ItemGroup(){
        return $this->belongsTo('App\Models\ItemGroup', 'item_group_id', 'id');
    }

    public function ItemCategory(){
        return $this->belongsTo('App\Models\ItemCategory','itemcategory_id','id');
    }

    public function Unit(){
        return $this->belongsTo('App\Models\Unit','unit_id','id');
    }

    public function Items(){
        return $this->hasManyThrough(
            'App\Models\Item',
            'App\Models\DetailItemGroup',
            'detail_item_group_category_id',
            'id',
            'id',
            'item_id'
        )->with('ItemCategory', 'Unit');
    }

    public function getItemListByItemGroup($ItemGroupId){
        return $this->with('Items')->where('item_group_id', $ItemGroupId)->where('is_deleted', 0)->get();
    }
}
