<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\employee\AddEmployeeRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddEmployeeAction extends BaseAdminController
{
    private $Employee;

    public function __construct(Employee $Employee){
        parent::__construct();
        $this->Employee = $Employee;
    }

    public function __invoke(AddEmployeeRequest $request)
    {
        $this->Employee->saveEmployee($request->all());
        return redirect(route('employee'))->with('result',['tabactive' => 'tab1','message' => 'The new group added successfully!']);
    }
}
