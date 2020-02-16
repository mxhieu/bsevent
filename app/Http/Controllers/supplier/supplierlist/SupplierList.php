<?php

namespace App\Http\Controllers\supplier\supplierlist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class SupplierList extends BaseAdminController
{
    protected $Supplier;

    public function __construct(Supplier $Supplier){
    	parent::__construct();
    	$this->Supplier = $Supplier;
    }

    public function __invoke()
    {
        $SupplierList = $this->Supplier->getSupplierListByStatus(0);
        foreach($SupplierList as $key => $row){
            $row->stt = ++$key;
            $row->status = $row->status==0?'Hoạt động':'Ngừng hoạt động';
        }
        return Datatables::of($SupplierList)
        ->addColumn('action', function ($SupplierList) {
                return '<a href="'.route('supplier', $SupplierList->id).'" class="btn btn-warning">Sửa</a>
                <a href="'.route('itemsupplierview', $SupplierList->id).'" class="btn btn-info">Hạng mục</a>
                <a href="" class="btn btn-success">Mua</a>
                <a href="" class="btn btn-primary">Đánh giá</a>
                <a href="'.route('deletesupplier', $SupplierList->id).'" class="btn btn-danger delete_confirm">Xóa</a>';
        })
        ->make(true);
    }
}
