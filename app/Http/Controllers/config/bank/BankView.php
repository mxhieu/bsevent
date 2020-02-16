<?php

namespace App\Http\Controllers\config\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class BankView extends BaseAdminController
{
    public function __construct(){
    	parent::__construct();
    }

    public function __invoke(Request $request)
    {
        return view('config.bank.index');
    }   
}
