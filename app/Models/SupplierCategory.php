<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'supplier_category';

    public $timestamps = true;
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'remark'];
    
    public function getSupplierCategoryListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }
}
