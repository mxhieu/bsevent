<?php

namespace App\Http\Controllers\project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ProjectList extends BaseAdminController
{
    public function __construct(Project $Project){
    	parent::__construct();
    	$this->Project = $Project;
    }

    public function __invoke()
    {
        $ProjectList = $this->Project->getProjectList();
        foreach($ProjectList as $key => $row)
        {
            $row->stt = ++$key;
            $row->status = $row->status == 0?"Hoạt động":"Ngừng hoạt động";
        }
        return Datatables::of($ProjectList)
        ->addColumn('action', function ($ProjectList) {
            return '
                    <a href="#" class="btn btn-info">Hạng mục</a>
                    <a href="'.route('projecttaskview').'" class="btn btn-success">Công việc</a>
                    <a href="'.route('gantttview').'" class="btn btn-secondary">Ghi chú</a>
                    <a href="#" class="btn btn-primary">Rủi ro</a>
                    <a href="#" class="btn btn-warning">Đống dự án</a>
                    <a href="" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
