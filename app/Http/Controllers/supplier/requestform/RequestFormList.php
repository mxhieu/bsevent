<?php

namespace App\Http\Controllers\supplier\requestform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestForm;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class RequestFormList extends BaseAdminController
{    
    public function __construct(RequestForm $RequestForm){
    	parent::__construct();
    	$this->RequestForm = $RequestForm;
    }

    public function __invoke()
    {
        $RequestFormList = $this->RequestForm->getRequestFormList(0);
        foreach($RequestFormList as $key => $val)
        {
            $val->stt = ++$key;
            $val->status = $val->status == 0?"Hoạt động":"Ngừng hoạt động";
            
            
        }
        return Datatables::of($RequestFormList)
        ->addColumn('action', function ($RequestFormList) {
            $action = '';
            if($RequestFormList->approve == 1)
            {
                $action = $RequestFormList->ApprovedUser->name.':'.date('d-m-Y', $RequestFormList->approved_at);
            }
            else
            {
                $action = '<a href="'.route('approverequestform', $RequestFormList->id).'" class="btn btn-info">Duyệt</a>
                <a href="'.route('deleterequestform', $RequestFormList->id).'" class="btn btn-danger delete_confirm">Xóa</a>';
            }
            return '<a href="'.route('requestform', $RequestFormList->id).'" class="btn btn-warning">Cập nhật</a>'. $action.'';
        })
        ->make(true);
    }
}
