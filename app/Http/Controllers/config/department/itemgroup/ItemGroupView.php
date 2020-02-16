<?php

namespace App\Http\Controllers\config\department\itemgroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ItemGroupView extends BaseAdminController
{
    public function __construct(Department $Department){
    	parent::__construct();
    	$this->Department = $Department;
    }

    public function __invoke($departmentId)
    {
        dd('dsadsa');
        $departmentInfo = $this->Department->find($departmentId);
        $data = [
            'departmentInfo' => $departmentInfo
        ];
        return view('config.department.itemgroup.index',$data);
    }
}
