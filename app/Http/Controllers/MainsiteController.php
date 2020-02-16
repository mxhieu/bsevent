<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class MainsiteController extends BaseAdminController
{
    public function __construct(){
    	parent::__construct();
    }

    public function __invoke(Request $request)
    {
        return view('layout.mainsite');
    }
}
