<?php

namespace App\Http\Controllers\supplier\requestform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestForm;
use Auth;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ApproveRequestForm extends BaseAdminController
{
    private $RequestForm;

    public function __construct(RequestForm $RequestForm)
    {
        parent::__construct();
        $this->RequestForm = $RequestForm;
    }

    /**
     * approve request form
     *
     * @param   int  $id  id of company representatives
     *
     * @return  [type]       redirect to company view
     */
    public function __invoke($id, Request $request)
    {
        $RequestFormInfo = $this->RequestForm->findOrFail($id);
        $RequestFormInfo->approve = 1;
        $RequestFormInfo->user_approve_id = Auth::user()->id;
        $RequestFormInfo->approved_at = time();
        $RequestFormInfo->save();
        return redirect(route('requestform'))->with('result', ['tabactive' => 'tab1','message' => 'Duyệt thành công yêu cầu!']);
    }
}
