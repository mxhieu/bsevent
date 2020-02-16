<?php

namespace App\Http\Controllers\config\unit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class UnitList extends BaseAdminController
{
    public function __construct(Unit $Unit){
    	parent::__construct();
    	$this->Unit = $Unit;
    }

    public function __invoke()
    {
        $UnitList = $this->Unit->getUnitListByStatus(0);
        return Datatables::of($UnitList)
        ->addColumn('action', function ($UnitList) {
                return '<a href="'.route('editunit', $UnitList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleteunit', $UnitList->id).'" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
