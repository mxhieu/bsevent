<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    protected $table = "item_group";
    
    protected $fillable = ["department_id", "name","code","remark"];

    public function DetailItemGroupCategory(){
        return $this->hasMany('App\Models\DetailItemGroupCategory', 'item_group_id', 'id');
    }

    public function DetailItemGroup(){
        return $this->hasManyThrough(
            'App\Models\DetailItemGroup',
            'App\Models\DetailItemGroupCategory',
            'item_group_id',
            'detail_item_group_category_id',
            'id',
            'id'
        );
    }

    public function getItemGroupByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function getItemGroup( $departmentId = null ){
        if(!empty($departmentId))
        {
            return $this->with(['DetailItemGroupCategory'])->where('is_deleted',0)->where('department_id', $departmentId)->orderBy('created_at','DESC')->get();
        }
        else
            return $this->with(['DetailItemGroupCategory'])->where('is_deleted',0)->orderBy('created_at','DESC')->get();
    }
}
