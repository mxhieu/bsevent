<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "supplier";
    
    protected $fillable = ['name', 'logo', 'code', 'supplier_category_id', 'status', 'bank_id', 'bankaccount', 'email', 'phone', 'fax', 'address', 'market_id', 'remark'];

    public function supplierCategory(){
        return $this->belongsTo('App\Models\SupplierCategory', 'supplier_category_id', 'id');
    }

    public function getSupplierListByStatus($status){
        return $this->with('supplierCategory')->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }
}
