<?php

namespace App\Http\Controllers\config\approve;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Approve;
use App\Http\Requests\config\approve\AddApproveRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddApproveAction extends BaseAdminController
{
    /**
     * instance of Approve model
     *
     * @var object
     */
    public $Approve;

    public function __construct(Approve $Approve){
    	parent::__construct();
    	$this->Approve = $Approve;
    }

    public function __invoke(AddApproveRequest $request)
    {
        $this->Approve->create($request->all());
        return redirect(route('approve'))->with('result',['tabactive' => 'tab1','message' => 'Thêm mới thành công trạng thái duyệt!']);
    }
}
