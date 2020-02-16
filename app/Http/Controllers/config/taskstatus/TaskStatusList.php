<?php

namespace App\Http\Controllers\config\taskstatus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TaskStatus;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class TaskStatusList extends BaseAdminController
{
    public function __construct(TaskStatus $TaskStatus){
    	parent::__construct();
    	$this->TaskStatus = $TaskStatus;
    }

    public function __invoke()
    {
        $TaskStatusList = $this->TaskStatus->getTaskStatusList();
        return Datatables::of($TaskStatusList)
        ->addColumn('action', function ($TaskStatusList) {
            return '<a href="'.route('edittaskstatus', $TaskStatusList->id).'" class="btn btn-warning">Cập nhật</a>
                    <a href="'.route('deletetaskstatus', $TaskStatusList->id).'" class="btn btn-danger delete_confirm"> Xóa</a>';
        })
        ->make(true);
    }
}
