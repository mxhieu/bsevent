<?php

namespace App\Http\Controllers\config\costcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CostCategory;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class CostCategoryList extends BaseAdminController
{
    public function __construct(CostCategory $CostCategory){
    	parent::__construct();
    	$this->CostCategory = $CostCategory;
    }

    public function __invoke()
    {
        $CostCategoryList = $this->CostCategory->getCostCategoryListByStatus(0);
        foreach($CostCategoryList as $row)
        {
            $row->member = 0;
        }
        return Datatables::of($CostCategoryList)
        ->addColumn('action', function ($CostCategoryList) {
                return '<a href="'.route('editcostcategory', $CostCategoryList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deletecostcategory', $CostCategoryList->id).'" class="btn btn-danger delete_confirm"> Delete</a>
            ';
        })
        ->make(true);
    }
}
