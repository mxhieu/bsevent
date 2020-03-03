<?php

namespace App\Http\Controllers\supplier\requestform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestForm;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteRequestForm extends BaseAdminController
{
    private $RequestForm;

    public function __construct(RequestForm $RequestForm)
    {
        parent::__construct();
        $this->RequestForm = $RequestForm;
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
        $RequestFormInfo = $this->RequestForm->findOrFail($id);
        $RequestFormInfo->is_deleted = 1;
        $RequestFormInfo->save();
        return redirect(route('requestform'))->with('result', ['tabactive' => 'tab1','message' => 'Xoá thành công yêu cầu!']);
    }
}
