<?php

namespace App\Http\Controllers\config\position;

use Illuminate\Http\Request;
use App\Models\Position;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;
use App\Http\Controllers\Controller;

class PositionList extends BaseAdminController
{
    public function __construct(Position $Position){
    	parent::__construct();
    	$this->Position = $Position;
    }

    public function __invoke()
    {
        $PositionList = $this->Position->getPositionListByStatus(0);
        foreach($PositionList as $row)
        {
            $row->member = $row->Employee->count();
        }
        return Datatables::of($PositionList)
        ->addColumn('action', function ($PositionList) {
                return '<a href="" class="btn btn-info">Member</a>
                <a href="'.route('editposition', $PositionList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleteposition', $PositionList->id).'" class="btn btn-danger delete_confirm"> Delete</a>
            ';
        })
        ->make(true);
    }
}
