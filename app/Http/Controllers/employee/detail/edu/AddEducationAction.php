<?php

namespace App\Http\Controllers\employee\detail\edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeEducation;
use App\Http\Requests\employee\AddEducationRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddEducationAction extends BaseAdminController
{
    private $EmployeeEducation;

    public function __construct(EmployeeEducation $EmployeeEducation){
        parent::__construct();
        $this->EmployeeEducation = $EmployeeEducation;
    }

    public function __invoke(AddEducationRequest $request, $id)
    {
        $param = $request->all();
        $param['employee_id'] = $id;
        $this->EmployeeEducation->saveEmployeeEducation($param);
        return redirect(route('detailemployee',$id))->with('result',['tabactive' => 'tab2','message' => 'The new education added successfully!']);
    }
}
