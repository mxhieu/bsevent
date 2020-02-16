<?php

namespace App\Http\Controllers\config\revenuecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RevenueCategory;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class RevenueCategoryList extends BaseAdminController
{
    public function __construct(RevenueCategory $RevenueCategory){
    	parent::__construct();
    	$this->RevenueCategory = $RevenueCategory;
    }

    public function __invoke()
    {
        $RevenueCategoryList = $this->RevenueCategory->getRevenueCategoryListByStatus(0);
        return Datatables::of($RevenueCategoryList)
        ->addColumn('action', function ($RevenueCategoryList) {
                return '<a href="'.route('editrevenuecategory', $RevenueCategoryList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleterevenuecategory', $RevenueCategoryList->id).'" class="btn btn-danger delete_confirm"> Delete</a>
            ';
        })
        ->make(true);
    }
}
