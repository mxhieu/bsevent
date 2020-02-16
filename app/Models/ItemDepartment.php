<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemDepartment extends BaseModel
{
    protected $table = "item_department";

    public function Department(){
    	return $this->belongsTo('App\Models\ItemDepartment', 'department_id', 'id');
    }
}
