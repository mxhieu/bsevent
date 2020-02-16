<?php

namespace App\Http\Controllers\config\department\itemgroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemGroup;
use App\Http\Requests\config\department\itemgroup\AddItemGroupRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddItemGroupAction extends BaseAdminController
{
    /**
     * instance of ItemGroup model
     *
     * @var object
     */
    public $ItemGroup;

    public function __construct(ItemGroup $ItemGroup){
    	parent::__construct();
    	$this->ItemGroup = $ItemGroup;
    }

    public function __invoke($departmentId, AddItemGroupRequest $request)
    {
        $param = $request->all();
        $param['department_id'] = $departmentId;
        $this->ItemGroup->create($param);
        return redirect(route('itemgroupview', $departmentId))->with('result',['tabactive' => 'tab1','message' => 'The new group added successfully!']);
    }   
}
