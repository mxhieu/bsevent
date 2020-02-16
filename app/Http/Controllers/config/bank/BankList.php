<?php

namespace App\Http\Controllers\config\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class BankList extends BaseAdminController
{
    public function __construct(Bank $Bank){
    	parent::__construct();
    	$this->Bank = $Bank;
    }

    public function __invoke()
    {
        $BankList = $this->Bank->getBankListByStatus(0);
        return Datatables::of($BankList)
        ->addColumn('action', function ($BankList) {
                return '<a href="'.route('editbank', $BankList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deletebank', $BankList->id).'" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
