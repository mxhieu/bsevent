<?php

namespace App\Http\Controllers\supplier\supplierlist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupplierCategory;
use App\Models\Bank;
use App\Models\Market;
use App\Models\Supplier;
use Session;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class SupplierView extends BaseAdminController
{
    protected $SupplierCategory, $Bank, $Market, $Supplier;

    public function __construct(SupplierCategory $SupplierCategory, Bank $Bank, Market $Market, Supplier $Supplier){
        parent::__construct();
        $this->SupplierCategory = $SupplierCategory;
        $this->Bank = $Bank;
        $this->Market = $Market;
        $this->Supplier = $Supplier;
    }

    public function __invoke(Request $request)
    {
        $SupplierInfo = [];
        if(!empty(request('id')))
        {
            if(!Session::has('result'))
            {
                Session::flash('result',['tabactive' => 'tab2']);
            }
            $SupplierInfo = $this->Supplier->find(request('id'));
            // dd($SupplierInfo);
        }
        
        $SupplierCategoryList = $this->SupplierCategory->getSupplierCategoryListByStatus(0);
        $BankList = $this->Bank->getBankListByStatus(0);
        $MarketList = $this->Market->getMarketListByStatus(0);
        $data = [
            'SupplierCategoryList' => $SupplierCategoryList,
            'BankList' => $BankList,
            'MarketList' => $MarketList,
            'SupplierInfo' => $SupplierInfo
        ];
        return view('supplier.index', $data);
    }
}
