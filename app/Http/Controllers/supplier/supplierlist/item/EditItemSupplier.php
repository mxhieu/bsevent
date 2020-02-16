<?php

namespace App\Http\Controllers\supplier\supplierlist\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemSupplier;
use App\Http\Requests\supplier\supplierlist\item\EditItemSupplierRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditItemSupplier extends BaseAdminController
{
    /**
     * Instance of Supplier model
     *
     * @var [type]
     */
    private $ItemSupplier;

    public function __construct(ItemSupplier $ItemSupplier){
    	parent::__construct();
    	$this->ItemSupplier = $ItemSupplier;
    }

    public function __invoke($supplierId, $itemId, EditItemSupplierRequest $request)
    {
        $ItemSupplierInfo = $this->ItemSupplier->findOrFail($itemId);
        $param = $request->all();
        $param['supplier_id'] = $supplierId;
        $param['image'] = $this->CheckUpdateField($request, $ItemSupplierInfo->image, 'image', 'supplier/item');
        $param['attact_file'] = $this->CheckUpdateField($request, $ItemSupplierInfo->attact_file, 'attact_file', 'file');
        $ItemSupplierInfo->fill($param);
        $ItemSupplierInfo->save();
        return redirect(route('itemsupplierview', $supplierId))->with('result', ['tabactive' => 'tab1','message' => 'Cập nhật thành công hạng mục!']);
    }
}
