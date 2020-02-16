<?php

namespace App\Http\Controllers\config\department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Http\Requests\config\department\AddDepartmentRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class addDepartmentAction extends BaseAdminController
{
    /**
     * instance of Department model
     *
     * @var object
     */
    public $Department;

    public function __construct(Department $Department){
    	parent::__construct();
    	$this->Department = $Department;
    }

    public function __invoke(AddDepartmentRequest $request)
    {
        $this->Department->saveDepartment($request->all());
        return redirect(route('department'))->with('result',['tabactive' => 'tab2','message' => 'The new company representatives added successfully!']);
    }   
}
