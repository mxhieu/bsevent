<?php

namespace App\Http\Controllers\config\servicecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ServiceCategoryList extends BaseAdminController
{
    public function __construct(ServiceCategory $ServiceCategory){
    	parent::__construct();
    	$this->ServiceCategory = $ServiceCategory;
    }

    public function __invoke()
    {
        $ServiceCategoryList = $this->ServiceCategory->getServiceCategoryListByStatus(0);
        return Datatables::of($ServiceCategoryList)
        ->addColumn('action', function ($ServiceCategoryList) {
                return '<a href="'.route('editservicecategory', $ServiceCategoryList->id).'" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
