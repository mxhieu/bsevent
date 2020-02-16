<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    protected $table = "task_status";

    protected $fillable = ['name', 'remark'];

    public $timestamps = true;

    public function getTaskStatusList($isDelete = 0){
        return $this->where('is_deleted', $isDelete)->orderBy('created_at','desc')->get();
    }
}
