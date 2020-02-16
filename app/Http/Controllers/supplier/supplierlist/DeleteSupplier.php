<?php

namespace App\Http\Controllers\supplier\supplierlist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteSupplier extends BaseAdminController
{
    private $Supplier;

    public function __construct(Supplier $Supplier)
    {
        parent::__construct();
        $this->Supplier = $Supplier;
    }

    /**
     * Soft delete company representatives
     *
     * @param   int  $id  id of company representatives
     *
     * @return  [type]       redirect to company view
     */
    public function __invoke($id)
    {
        $SupplierInfo = $this->Supplier->findOrFail($id);
        $SupplierInfo->is_deleted = 1;
        $SupplierInfo->save();
        return redirect(route('supplier'))->with('result', ['tabactive' => 'tab1','message' => 'Xoá thành công nhà cung cấp!']);
    }
}
