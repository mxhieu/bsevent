<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    protected $table = "requestform";

    protected $fillable = ['name','project_id', 'deadline', 'code', 'employee_id', 'status', 'remark'];

    public $timestamps = true;

    public function Project(){
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    public function Employee(){
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }

    public function ApprovedUser(){
        return $this->belongsTo('App\Models\Employee', 'user_approve_id', 'id');
    }

    public function getRequestFormList($status = 0){
        return $this->with(['Project', 'Employee', 'ApprovedUser'])->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }
}
