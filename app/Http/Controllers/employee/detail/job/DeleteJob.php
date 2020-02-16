<?php

namespace App\Http\Controllers\employee\detail\job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeJob;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteJob extends BaseAdminController
{
    private $EmployeeJob;

    public function __construct(EmployeeJob $EmployeeJob)
    {
        parent::__construct();
        $this->EmployeeJob = $EmployeeJob;
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
        $EmployeeJobInfo = $this->EmployeeJob->findOrFail($id);
        $EmployeeJobInfo->is_deleted = 1;
        $EmployeeJobInfo->save();
        return redirect(route('detailemployee',$EmployeeJobInfo->employee_id))->with('result', ['tabactive' => 'tab4','message' => 'The job deleted successfully!']);
    }
}
