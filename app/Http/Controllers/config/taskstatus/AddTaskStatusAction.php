<?php

namespace App\Http\Controllers\config\taskstatus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TaskStatus;
use App\Http\Requests\config\taskstatus\AddTaskStatusRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddTaskStatusAction extends BaseAdminController
{
    /**
     * instance of Bank model
     *
     * @var object
     */
    public $TaskStatus;

    public function __construct(TaskStatus $TaskStatus){
    	parent::__construct();
    	$this->TaskStatus = $TaskStatus;
    }

    public function __invoke(AddTaskStatusRequest $request)
    {
        $this->TaskStatus->create($request->all());
        return redirect(route('taskstatus'))->with('result',['tabactive' => 'tab1','message' => 'Thêm  thành công trạng thái công việc!']);
    }
}
