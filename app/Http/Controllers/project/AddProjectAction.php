<?php

namespace App\Http\Controllers\project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\project\AddProjectRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddProjectAction extends BaseAdminController
{
    /**
     * instance of Project model
     *
     * @var object
     */
    public $Project;

    public function __construct(Project $Project){
    	parent::__construct();
    	$this->Project = $Project;
    }

    public function __invoke(AddProjectRequest $request)
    {
        $this->Project->create($request->all());
        return redirect(route('projectview'))->with('result', ['tabactive' => 'tab1','message' => 'Thêm thành công dự án!']);
    }
}
