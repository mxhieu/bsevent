<?php

namespace App\Http\Controllers\config\suppliercategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class SupplierCategoryView extends BaseAdminController
{
    public function __construct(){
    	parent::__construct();
    }

    public function __invoke(Request $request)
    {
        return view('config.suppliercategory.index');
    } 
}
