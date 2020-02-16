<?php

namespace App\Http\Controllers\config\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Session;
use App\Http\Requests\config\Service\EditServiceRequest;
use App\Models\ServiceCategory;
use App\Models\Unit;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditService extends BaseAdminController
{
    /**
     * Instance of Service model
     *
     * @var [type]
     */
    private $Service;

    public function __construct(Service $Service, ServiceCategory $ServiceCategory, Unit $Unit){
    	parent::__construct();
        $this->Service = $Service;
        $this->ServiceCategory = $ServiceCategory;
        $this->Unit = $Unit;
    }

    public function __invoke($id, EditServiceRequest $request)
    {
        $ServiceCategoryList = $this->ServiceCategory->getServiceCategoryListByStatus('0');
        $data['ServiceCategoryList'] = $ServiceCategoryList;
        $UnitList = $this->Unit->getUnitListByStatus(0);
        $data['UnitList'] = $UnitList;
        $ServiceInfo = $this->Service->findOrFail($id);
        $data['ServiceInfo'] = $ServiceInfo;
        if($request->isMethod('post'))
        {
            $param = $request->all();
            //Set logo if not change
            $param['image'] = $this->CheckUpdateField($request, $ServiceInfo->image, 'image', 'service');
            $param['attach_file'] = $this->CheckUpdateField($request, $ServiceInfo->attach_file, 'attach_file', 'service/file');
            $this->Service->updateService($ServiceInfo, $param);
            return redirect(route('service'))->with('result',['tabactive' => 'tab1','message' => 'The Service updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.Service.index', $data);
    }
}
