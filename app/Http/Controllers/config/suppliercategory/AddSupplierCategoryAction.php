<?php

namespace App\Http\Controllers\config\suppliercategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupplierCategory;
use App\Http\Requests\config\suppliercategory\AddSupplierCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddSupplierCategoryAction extends BaseAdminController
{
    /**
     * instance of Bank model
     *
     * @var object
     */
    public $SupplierCategory;

    public function __construct(SupplierCategory $SupplierCategory){
    	parent::__construct();
    	$this->SupplierCategory = $SupplierCategory;
    }

    public function __invoke(AddSupplierCategoryRequest $request)
    {
        $this->SupplierCategory->create($request->all());
        return redirect(route('suppliercategory'))->with('result',['tabactive' => 'tab1','message' => 'Thêm thành công loại nhà cung cấp!']);
    }
}
