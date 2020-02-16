<?php

namespace App\Http\Controllers\config\evalform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EvalFormItem;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EvalformItemList extends BaseAdminController
{
    public function __construct(EvalFormItem $EvalFormItem){
    	parent::__construct();
    	$this->EvalFormItem = $EvalFormItem;
    }

    public function __invoke($id)
    {
        $EvalFormItemList = $this->EvalFormItem->getEvalItemById($id);
        $EvalFormItemList = $this->recursive($EvalFormItemList, 0);
        return Datatables::of($EvalFormItemList)
        ->addColumn('action', function ($EvalFormItemList) {
                return '<a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }

    public $newArr;

    public function recursive($data, $parent_id, $prefix=''){
        foreach($data as $key => $row)
        {
            if($row->parent_id == $parent_id)
            {
                $this->newArr[$key] = $row;
                $this->newArr[$key]['name'] = $prefix.$row->name;
                $this->recursive($data, $row->id,$prefix.'--');
            }
        }
        return $this->newArr;
    }
}
