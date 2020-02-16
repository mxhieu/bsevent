<?php

namespace App\Http\Controllers\config\department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteDepartment extends BaseAdminController
{
    private $Department;

    public function __construct(Department $Department)
    {
        parent::__construct();
        $this->Department = $Department;
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
        $DepartmentInfo = $this->Department->findOrFail($id);
        $DepartmentInfo->is_deleted = 1;
        $DepartmentInfo->save();
        return redirect(route('department'))->with('result', ['tabactive' => 'tab1','message' => 'The department deleted successfully!']);
    }
}
