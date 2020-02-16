<?php

namespace App\Http\Controllers\config\suppliercategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupplierCategory;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class SupplierCategoryList extends BaseAdminController
{
    public function __construct(SupplierCategory $SupplierCategory){
    	parent::__construct();
    	$this->SupplierCategory = $SupplierCategory;
    }

    public function __invoke()
    {
        $SupplierCategoryList = $this->SupplierCategory->getSupplierCategoryListByStatus(0);
        return Datatables::of($SupplierCategoryList)
        ->addColumn('action', function ($SupplierCategoryList) {
                return '<a href="'.route('editsuppliercategory', $SupplierCategoryList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deletesuppliercategory', $SupplierCategoryList->id).'" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
