<?php

namespace App\Http\Controllers\config\profitsharecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfitShareCategory;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ProfitShareCategoryList extends BaseAdminController
{
    public function __construct(ProfitShareCategory $ProfitShareCategory){
    	parent::__construct();
    	$this->ProfitShareCategory = $ProfitShareCategory;
    }

    public function __invoke()
    {
        $ProfitShareCategoryList = $this->ProfitShareCategory->getProfitShareCategoryListByStatus(0);
        foreach($ProfitShareCategoryList as $row)
        {
            $row->member = 0;
        }
        return Datatables::of($ProfitShareCategoryList)
        ->addColumn('action', function ($ProfitShareCategoryList) {
                return '<a href="'.route('editprofitsharecategory', $ProfitShareCategoryList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleteprofitsharecategory', $ProfitShareCategoryList->id).'" class="btn btn-danger delete_confirm"> Delete</a>
            ';
        })
        ->make(true);
    }
}
