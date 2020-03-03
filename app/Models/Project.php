<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "project";

    protected $fillable = ['name','item_group_id', 'task_group_id', 'code', 'attact_file', 'stackholder', 'status', 'in_range', 'out_range', 'remark'];

    public $timestamps = true;

    public function getProjectList($status = 0){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }
}
