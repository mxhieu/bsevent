<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemSupplier extends Model
{
    protected $table = "item_supplier";

    protected $fillable = ["supplier_id", "item_id", "name", "code", "image", "min_price", "max_price", "unit_price", "discount", "attact_file", "min_capacity", "max_capacity", "unit_capacity", "preparation_time", "status", "remark"];

    public function unitItem()
    {
        return $this->hasOneThrough(
            'App\Models\Unit',
            'App\Models\Item',
            'id',
            'id',
            'item_id',
            'unit_id'
        );
    }

    public function Supplier(){
        return $this->belongsTo('App\Models\Supplier', 'supplier_id', 'id');
    }

    public function getItemSupplierListByStatus($status){
        return $this->with(['unitItem', 'Supplier'])->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function getBySupplierId($SupplierId){
        return $this->with('unitItem')->where('is_deleted', 0)->where('supplier_id', $SupplierId)->orderBy('created_at','desc')->get();
    }
}
