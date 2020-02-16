<?php

namespace App\Http\Controllers\supplier\scmitem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemSupplier;
use App\Http\Requests\supplier\supplierlist\item\AddItemSupplierRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddSCMItemAction extends BaseAdminController
{
    public $ItemSupplier;

    public function __construct(ItemSupplier $ItemSupplier){
    	parent::__construct();
    	$this->ItemSupplier = $ItemSupplier;
    }

    public function __invoke(AddItemSupplierRequest $request)
    {
        $param = $request->all();
        $param['image'] = $this->uploadFile($request, 'image', 'supplier/item');
        if(!empty($request->post('attact_file')))
        {
            $param['attact_file'] = $this->uploadFile($request, 'attact_file', 'file');
        }
        $this->ItemSupplier->create($param);
        return redirect(route('scmitem'))->with('result',['tabactive' => 'tab1','message' => 'Thêm mới thành công hạng mục!']);
    }
}
