<?php

namespace App\Http\Controllers\config\revenuecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class RevenueView extends BaseAdminController
{
    public function __construct(Department $Department){
    	parent::__construct();
    	$this->Department = $Department;
    }

    public function __invoke(Request $request)
    {
        // $data['DepartmentList'] = array();
        return view('config.revenuecategory.index');
    }   
}
