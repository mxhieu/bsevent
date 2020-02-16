<?php

namespace App\Http\Controllers\supplier\supplierlist\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemSupplier;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ItemSupplierList extends BaseAdminController
{
    protected $ItemSupplier;

    public function __construct(ItemSupplier $ItemSupplier){
    	parent::__construct();
    	$this->ItemSupplier = $ItemSupplier;
    }

    public function __invoke($id)
    {
        $ItemSupplierList = $this->ItemSupplier->getBySupplierId($id);
        foreach($ItemSupplierList as $key => $row){
            $row->stt = ++$key;
            $row->status = $row->status==0?'Hoạt động':'Ngừng hoạt động';
            $row->price = number_format($row->min_price).' - '.number_format($row->max_price);
            $row->capacity = number_format($row->min_capacity).' - '.number_format($row->max_capacity);
        }
        return Datatables::of($ItemSupplierList)
        ->addColumn('action', function ($ItemSupplierList) {
                return '<a href="'.route('itemsupplierview', ['id' => $ItemSupplierList->supplier_id, 'itemId' => $ItemSupplierList->id]).'" class="btn btn-warning">Chi tiết</a>
                <a href="'.route('deleteitemsupplier', ['supplierId' => $ItemSupplierList->supplier_id, 'itemId' => $ItemSupplierList->id]).'" class="btn btn-danger delete_confirm">Xóa</a>';
        })
        ->make(true);
    }
}
