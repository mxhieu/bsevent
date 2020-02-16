<?php

namespace App\Http\Controllers\config\itemcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ItemCategoryList extends BaseAdminController
{
    public function __construct(ItemCategory $ItemCategory){
    	parent::__construct();
    	$this->ItemCategory = $ItemCategory;
    }

    public function __invoke()
    {
        $ItemCategoryList = $this->ItemCategory->getItemCategoryListByStatus(0);
        return Datatables::of($ItemCategoryList)
        ->addColumn('action', function ($ItemCategoryList) {
                return '<a href="'.route('edititemcategory', $ItemCategoryList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleteitemcategory', $ItemCategoryList->id).'" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
