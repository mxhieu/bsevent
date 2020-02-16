<?php

namespace App\Http\Controllers\config\department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Session;
use App\Http\Requests\config\department\EditDepartmentRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditDepartment extends BaseAdminController
{
    /**
     * Instance of Department model
     *
     * @var [type]
     */
    private $Department;

    public function __construct(Department $Department){
    	parent::__construct();
    	$this->Department = $Department;
    }

    public function __invoke($id, EditDepartmentRequest $request)
    {
        $DepartmentInfo = $this->Department->findOrFail($id);
        $data['DepartmentInfo'] = $DepartmentInfo;
        if($request->isMethod('post'))
        {
            $this->Department->updateDepartment($DepartmentInfo, $request->all());
            return redirect(route('department'))->with('result',['tabactive' => 'tab2','message' => 'The department updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.department.index', $data);
    }
}
