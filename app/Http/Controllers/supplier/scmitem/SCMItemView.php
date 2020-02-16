<?php

namespace App\Http\Controllers\supplier\scmitem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Models\Supplier;
use App\Models\ItemSupplier;
use Session;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class SCMItemView extends BaseAdminController
{

    protected $ItemCategory, $Supplier, $ItemSupplier;

    public function __construct(ItemCategory $ItemCategory, Supplier $Supplier, ItemSupplier $ItemSupplier){
        parent::__construct();
        $this->ItemCategory = $ItemCategory;
        $this->Supplier = $Supplier;
        $this->ItemSupplier = $ItemSupplier;
    }

    public function __invoke(Request $request)
    {
        $ItemSupplierInfo = [];
        if(!empty(request('itemId')))
        {
            if(!Session::has('result'))
            {
                Session::flash('result',['tabactive' => 'tab2']);
            }
            $ItemSupplierInfo = $this->ItemSupplier->find(request('itemId'));
        }
        $UnitCapacity = config('const')['UNIT_CAPACITY'];
        $ItemCategoryList = $this->ItemCategory->getItemCategoryListByStatus(0);
        $supplierList = $this->Supplier->getSupplierListByStatus(0);
        $data = [
            'supplierList' => $supplierList,
            'ItemCategoryList' => $ItemCategoryList,
            'ItemSupplierInfo' => $ItemSupplierInfo,
            'UnitCapacity' => $UnitCapacity
        ];
        return view('supplier.scmitem.index', $data);
    }
}
