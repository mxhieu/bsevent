<?php

namespace App\Http\Controllers\config\approve;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Approve;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ApproveList extends BaseAdminController
{
    public function __construct(Approve $Approve){
    	parent::__construct();
    	$this->Approve = $Approve;
    }

    public function __invoke()
    {
        $ApproveList = $this->Approve->getApproveList();
        return Datatables::of($ApproveList)
        ->addColumn('action', function ($ApproveList) {
                return '<a href="'.route('editapprove', $ApproveList->id).'" class="btn btn-warning">Cập nhật</a>
                <a href="'.route('deleteapprove', $ApproveList->id).'" class="btn btn-danger delete_confirm"> Xóa</a>';
        })
        ->make(true);
    }
}
