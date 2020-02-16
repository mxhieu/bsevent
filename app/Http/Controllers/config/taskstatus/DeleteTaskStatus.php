<?php

namespace App\Http\Controllers\config\taskstatus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TaskStatus;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteTaskStatus extends BaseAdminController
{
    private $TaskStatus;

    public function __construct(TaskStatus $TaskStatus)
    {
        parent::__construct();
        $this->TaskStatus = $TaskStatus;
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
        $TaskStatusInfo = $this->TaskStatus->findOrFail($id);
        $TaskStatusInfo->is_deleted = 1;
        $TaskStatusInfo->save();
        return redirect(route('taskstatus'))->with('result', ['tabactive' => 'tab1','message' => 'Xóa thành công trạng thái công việc!']);
    }
}
