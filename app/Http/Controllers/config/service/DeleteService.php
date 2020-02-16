<?php

namespace App\Http\Controllers\config\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteService extends BaseAdminController
{
    private $Service;

    public function __construct(Service $Service)
    {
        parent::__construct();
        $this->Service = $Service;
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
        $ServiceInfo = $this->Service->findOrFail($id);
        $ServiceInfo->is_deleted = 1;
        $ServiceInfo->save();
        return redirect(route('service'))->with('result', ['tabactive' => 'tab1','message' => 'The Service deleted successfully!']);
    }
}
