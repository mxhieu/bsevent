<?php

namespace App\Http\Controllers\config\approve;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Approve;
use Session;
use App\Http\Requests\config\approve\EditApproveRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditApprove extends BaseAdminController
{
    /**
     * Instance of Approve model
     *
     * @var [type]
     */
    private $Approve;

    public function __construct(Approve $Approve){
    	parent::__construct();
    	$this->Approve = $Approve;
    }

    public function __invoke($id, EditApproveRequest $request)
    {
        $ApproveInfo = $this->Approve->findOrFail($id);
        $data['ApproveInfo'] = $ApproveInfo;
        if($request->isMethod('post'))
        {
            $param = $request->all();
            $param['id'] = $ApproveInfo->id;
            $ApproveInfo->fill($param);
            $ApproveInfo->save();
            return redirect(route('approve'))->with('result',['tabactive' => 'tab1','message' => 'Cập nhật thành công trạng thái duyệt!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.approve.index', $data);
    }
}
