<?php

namespace App\Http\Controllers\config\position;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class PositionView extends BaseAdminController
{
    public function __construct(){
    	parent::__construct();
    }

    public function __invoke(Request $request)
    {
        return view('config.position.index');
    }
}
