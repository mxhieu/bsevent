<?php

namespace App\Http\Controllers\supplier\supplierlist\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemSupplier;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteItemSupplier extends BaseAdminController
{
    private $ItemSupplier;

    public function __construct(ItemSupplier $ItemSupplier)
    {
        parent::__construct();
        $this->ItemSupplier = $ItemSupplier;
    }

    /**
     * Soft delete company representatives
     *
     * @param   int  $id  id of company representatives
     *
     * @return  [type]       redirect to company view
     */
    public function __invoke($supplierId, $itemId, Request $request)
    {
        $ItemSupplierInfo = $this->ItemSupplier->findOrFail($itemId);
        $ItemSupplierInfo->is_deleted = 1;
        $ItemSupplierInfo->save();
        return redirect(route('itemsupplierview', $supplierId))->with('result', ['tabactive' => 'tab1','message' => 'Xóa thành công hạng mục!']);
    }
}
