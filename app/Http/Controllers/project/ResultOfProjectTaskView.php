<?php

namespace App\Http\Controllers\project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ResultOfProjectTaskView extends BaseAdminController
{
    
    public function __construct(){
    	parent::__construct();
    }

    public function __invoke(Request $request)
    {
        return view('project.task.result.index');
    }
}
