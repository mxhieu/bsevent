<?php

namespace App\Http\Controllers\employee\detail\edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeEducation;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteEducation extends BaseAdminController
{
    private $EmployeeEducation;

    public function __construct(EmployeeEducation $EmployeeEducation)
    {
        parent::__construct();
        $this->EmployeeEducation = $EmployeeEducation;
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
        $EmployeeEducationInfo = $this->EmployeeEducation->findOrFail($id);
        $EmployeeEducationInfo->is_deleted = 1;
        $EmployeeEducationInfo->save();
        return redirect(route('detailemployee',$EmployeeEducationInfo->employee_id))->with('result', ['tabactive' => 'tab2','message' => 'The EmployeeEducation deleted successfully!']);
    }
}
