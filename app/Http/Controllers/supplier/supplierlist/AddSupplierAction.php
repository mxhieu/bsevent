<?php

namespace App\Http\Controllers\supplier\supplierlist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Http\Requests\supplier\supplierlist\AddSupplierRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddSupplierAction extends BaseAdminController
{
    public $Supplier;

    public function __construct(Supplier $Supplier){
    	parent::__construct();
    	$this->Supplier = $Supplier;
    }

    public function __invoke(AddSupplierRequest $request)
    {
        $param = $request->all();
        $param['logo'] = $this->uploadFile($request, 'logo', 'supplier');
        $param['market_id'] = json_encode($request->post('market_id'));
        $this->Supplier->create($param);
        return redirect(route('supplier'))->with('result',['tabactive' => 'tab1','message' => 'Thêm mới thành công nhà cung cấp!']);
    }
}
