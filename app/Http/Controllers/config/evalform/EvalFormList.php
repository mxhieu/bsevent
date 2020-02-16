<?php

namespace App\Http\Controllers\config\evalform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EvalForm;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EvalFormList extends BaseAdminController
{
    public function __construct(EvalForm $EvalForm){
    	parent::__construct();
    	$this->EvalForm = $EvalForm;
    }

    public function __invoke()
    {
        $EvalFormList = $this->EvalForm->getEvalFormListByStatus(0);
        foreach($EvalFormList as $row)
        {
            $row->item = 0;
        }
        return Datatables::of($EvalFormList)
        ->addColumn('action', function ($EvalFormList) {
                return '<a href="'.route('evalformitem', $EvalFormList->id).'" class="btn btn-success">Hạng mục</a>
                <a href="'.route('editevalform', $EvalFormList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleteevalform', $EvalFormList->id).'" class="btn btn-danger delete_confirm"> Delete</a>
            ';
        })
        ->make(true);
    }
}
