<?php

namespace App\Http\Controllers\config\taxcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TaxCategory;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class TaxCategoryList extends BaseAdminController
{
    public function __construct(TaxCategory $TaxCategory){
    	parent::__construct();
    	$this->TaxCategory = $TaxCategory;
    }

    public function __invoke()
    {
        $TaxCategoryList = $this->TaxCategory->getTaxCategoryListByStatus(0);
        return Datatables::of($TaxCategoryList)
        ->addColumn('action', function ($TaxCategoryList) {
                return '<a href="'.route('edittaxcategory', $TaxCategoryList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deletetaxcategory', $TaxCategoryList->id).'" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
