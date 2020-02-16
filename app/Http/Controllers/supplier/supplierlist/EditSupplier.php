<?php

namespace App\Http\Controllers\supplier\supplierlist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Http\Requests\supplier\supplierlist\EditSupplierRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditSupplier extends BaseAdminController
{
    /**
     * Instance of Supplier model
     *
     * @var [type]
     */
    private $Supplier;

    public function __construct(Supplier $Supplier){
    	parent::__construct();
    	$this->Supplier = $Supplier;
    }

    public function __invoke($id, EditSupplierRequest $request)
    {
        $SupplierInfo = $this->Supplier->findOrFail($id);
        $param = $request->all();
        $param['logo'] = $this->CheckUpdateField($request, $SupplierInfo->logo, 'logo', 'supplier');
        $SupplierInfo->fill($param);
        $SupplierInfo->save();
        return redirect(route('supplier'))->with('result', ['tabactive' => 'tab1','message' => 'Nhà cung cấp cập nhật thành công!']);
    }
}
