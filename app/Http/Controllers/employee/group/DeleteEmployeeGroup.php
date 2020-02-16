<?php

namespace App\Http\Controllers\employee\group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GroupEmployee;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteEmployeeGroup extends BaseAdminController
{
    private $GroupEmployee;

    public function __construct(GroupEmployee $GroupEmployee)
    {
        parent::__construct();
        $this->GroupEmployee = $GroupEmployee;
    }

    /**
     * Soft delete employee group
     *
     * @param   int  $id  id of company representatives
     *
     * @return  [type]       redirect to company view
     */
    public function __invoke($id)
    {
        $GroupEmployeeInfo = $this->GroupEmployee->findOrFail($id);
        $GroupEmployeeInfo->is_deleted = 1;
        $GroupEmployeeInfo->save();
        return redirect(route('employeegroup'))->with('result', ['tabactive' => 'tab1','message' => 'The group deleted successfully!']);
    }
}
