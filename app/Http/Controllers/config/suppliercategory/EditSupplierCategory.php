<?php

namespace App\Http\Controllers\config\suppliercategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupplierCategory;
use Session;
use App\Http\Requests\config\suppliercategory\EditSupplierCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditSupplierCategory extends BaseAdminController
{
    /**
     * Instance of SupplierCategory model
     *
     * @var [type]
     */
    private $SupplierCategory;

    public function __construct(SupplierCategory $SupplierCategory){
    	parent::__construct();
    	$this->SupplierCategory = $SupplierCategory;
    }

    public function __invoke($id, EditSupplierCategoryRequest $request)
    {
        $SupplierCategoryInfo = $this->SupplierCategory->findOrFail($id);
        $data['SupplierCategoryInfo'] = $SupplierCategoryInfo;
        if($request->isMethod('post'))
        {
            $param = $request->all();
            $param['id'] = $SupplierCategoryInfo->id;
            $SupplierCategoryInfo->fill($param);
            $SupplierCategoryInfo->save();
            return redirect(route('suppliercategory'))->with('result',['tabactive' => 'tab1','message' => 'Cập nhật thành công loại nhà cung cấp!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.SupplierCategory.index', $data);
    }
}
