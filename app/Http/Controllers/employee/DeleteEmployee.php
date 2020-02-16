<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteEmployee extends BaseAdminController
{
    private $Employee;

    public function __construct(Employee $Employee)
    {
        parent::__construct();
        $this->Employee = $Employee;
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
        $EmployeeInfo = $this->Employee->findOrFail($id);
        $EmployeeInfo->is_deleted = 1;
        $EmployeeInfo->save();
        return redirect(route('employee'))->with('result', ['tabactive' => 'tab1','message' => 'The Employee deleted successfully!']);
    }
}
