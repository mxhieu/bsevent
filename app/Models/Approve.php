<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{
    protected $table = "approve";

    protected $fillable = ['name', 'remark'];

    public $timestamps = true;

    public function getApproveList($isDelete = 0){
        return $this->where('is_deleted', $isDelete)->orderBy('created_at','desc')->get();
    }
}
