<?php

namespace App\Http\Controllers\config\market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class MarketList extends BaseAdminController
{
    public function __construct(Market $Market){
    	parent::__construct();
    	$this->Market = $Market;
    }

    public function __invoke()
    {
        $MarketList = $this->Market->getMarketListByStatus(0);
        return Datatables::of($MarketList)
        ->addColumn('action', function ($MarketList) {
            return '<a href="'.route('editmarket', $MarketList->id).'" class="btn btn-warning">Edit</a>
                    <a href="'.route('deletemarket', $MarketList->id).'" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
