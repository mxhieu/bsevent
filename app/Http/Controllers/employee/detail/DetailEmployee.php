<?php

namespace App\Http\Controllers\employee\detail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\employee\EmployeeDetailRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DetailEmployee extends BaseAdminController
{

    private $Employee;

    public function __construct(Employee $Employee){
        parent::__construct();
        $this->Employee = $Employee;
    }

    public function __invoke(EmployeeDetailRequest $request, $id)
    {
        $EmployeeInfo = $this->Employee->findOrFail($id);
        $data['EmployeeInfo'] = $EmployeeInfo;
        if($request->isMethod('post'))
        {
            $this->Employee->updateEmployee($EmployeeInfo, $request->all(), true);
            return redirect(route('detailemployee',$id))->with('result',['tabactive' => 'tab1','message' => 'The employee updated successfully!']); 
        }
        return view('employee.detail.index', $data);
    }
}