<?php

namespace App\Http\Controllers\supplier\requestform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Project;
use App\Models\RequestForm;
use Session;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class RequestFormView extends BaseAdminController
{

    protected $Employee, $Project, $RequestForm;

    public function __construct(Employee $Employee, Project $Project, RequestForm $RequestForm){
        parent::__construct();
        $this->Employee = $Employee;
        $this->Project = $Project;
        $this->RequestForm = $RequestForm;
    }

    public function __invoke(Request $request)
    {
        $requestformInfo = [];
        if(!empty(request('id')))
        {
            if(!Session::has('result'))
            {
                Session::flash('result',['tabactive' => 'tab2']);
            }
            $requestformInfo = $this->RequestForm->find(request('id'));
        }
        $listProject = $this->Project->getProjectList(0);
        $listEmployee = $this->Employee->getEmployeeListByStatus(0);
        $data = [
            'listProject' => $listProject,
            'listEmployee' => $listEmployee,
            'requestformInfo' => $requestformInfo
        ];
        return view('supplier.requestform.index', $data);
    }
}
