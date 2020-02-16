<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $table = "market";

    protected $fillable = ['name', 'remark'];

    public $timestamps = true;

    public function getMarketListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }
}
