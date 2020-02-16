<?php

namespace App\Http\Controllers\config\suppliercategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupplierCategory;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteSupplierCategory extends BaseAdminController
{
    private $SupplierCategory;

    public function __construct(SupplierCategory $SupplierCategory)
    {
        parent::__construct();
        $this->SupplierCategory = $SupplierCategory;
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
        $SupplierCategoryInfo = $this->SupplierCategory->findOrFail($id);
        $SupplierCategoryInfo->is_deleted = 1;
        $SupplierCategoryInfo->save();
        return redirect(route('suppliercategory'))->with('result', ['tabactive' => 'tab1','message' => 'Xóa thành công loại nhà cung cấp!']);
    }
}
