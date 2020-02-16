<?php

namespace App\Http\Controllers\supplier\scmitem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemSupplier;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class SCMItemList extends BaseAdminController
{
    protected $ItemSupplier;

    public function __construct(ItemSupplier $ItemSupplier){
    	parent::__construct();
    	$this->ItemSupplier = $ItemSupplier;
    }

    public function __invoke()
    {
        $ItemSupplierList = $this->ItemSupplier->getItemSupplierListByStatus(0);
        foreach($ItemSupplierList as $key => $row){
            $row->stt = ++$key;
            $row->status = $row->status==0?'Hoạt động':'Ngừng hoạt động';
            $row->price = number_format($row->min_price).' - '.number_format($row->max_price);
            $row->capacity = number_format($row->min_capacity).' - '.number_format($row->max_capacity);
        }
        return Datatables::of($ItemSupplierList)
        ->addColumn('supplier_link', function ($ItemSupplierList) {
            return '<a href="'.route('supplier', $ItemSupplierList->supplier_id).'">'.$ItemSupplierList->Supplier->name.'</a>';
        })
        ->addColumn('action', function ($ItemSupplierList) {
                return '<a href="'.route('scmitem', ['itemId' => $ItemSupplierList->id]).'" class="btn btn-warning">Chi tiết</a>
                <a href="'.route('deletescmitem', ['itemId' => $ItemSupplierList->id]).'" class="btn btn-danger delete_confirm">Xóa</a>';
        })->rawColumns(['supplier_link', 'action'])
        ->make(true);
    }
}
