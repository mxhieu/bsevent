<?php

namespace App\Http\Controllers\config\taskstatus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TaskStatus;
use Session;
use App\Http\Requests\config\taskstatus\EditTaskStatusRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditTaskStatus extends BaseAdminController
{
    /**
     * Instance of TaskStatus model
     *
     * @var [type]
     */
    private $TaskStatus;

    public function __construct(TaskStatus $TaskStatus){
    	parent::__construct();
    	$this->TaskStatus = $TaskStatus;
    }

    public function __invoke($id, EditTaskStatusRequest $request)
    {
        $TaskStatusInfo = $this->TaskStatus->findOrFail($id);
        $data['TaskStatusInfo'] = $TaskStatusInfo;
        if($request->isMethod('post'))
        {
            $param = $request->all();
            $param['id'] = $TaskStatusInfo->id;
            $TaskStatusInfo->fill($param);
            $TaskStatusInfo->save();
            return redirect(route('taskstatus'))->with('result',['tabactive' => 'tab1','message' => 'Cập nhật thành công trạng thái công việc!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.taskstatus.index', $data);
    }
}
