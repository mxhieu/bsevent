<?php

namespace App\Http\Controllers\project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class GanttChartView extends Controller
{

    public function __invoke(Request $request)
    {
        return view('project.gantt');
    }
}


