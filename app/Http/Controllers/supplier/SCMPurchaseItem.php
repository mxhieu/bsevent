<?php

namespace App\Http\Controllers\supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class SCMPurchaseItem extends BaseAdminController
{
    public function __construct(){
    	parent::__construct();
    }

    public function __invoke(Request $request)
    {
        return view('supplier.purchaseitem.index');
    }
}
