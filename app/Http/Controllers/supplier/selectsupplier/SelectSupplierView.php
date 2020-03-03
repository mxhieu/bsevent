<?php

namespace App\Http\Controllers\supplier\selectsupplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class SelectSupplierView extends BaseAdminController
{
    public function __construct(){
    	parent::__construct();
    }

    public function __invoke(Request $request)
    {
        return view('supplier.selectsupplier.index');
    }
}
