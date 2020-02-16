<?php

namespace App\Http\Controllers\config\approve;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Approve;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteApprove extends BaseAdminController
{
    private $Approve;

    public function __construct(Approve $Approve)
    {
        parent::__construct();
        $this->Approve = $Approve;
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
        $ApproveInfo = $this->Approve->findOrFail($id);
        $ApproveInfo->is_deleted = 1;
        $ApproveInfo->save();
        return redirect(route('approve'))->with('result', ['tabactive' => 'tab1','message' => 'Xóa thành công trạng thái duyệt!']);
    }
}
