<?php

namespace App\Http\Controllers\config\department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DepartmentView extends BaseAdminController
{
    public function __construct(Department $Department){
    	parent::__construct();
    	$this->Department = $Department;
    }

    public function __invoke(Request $request)
    {
        return view('config.department.index');
    }   
}
