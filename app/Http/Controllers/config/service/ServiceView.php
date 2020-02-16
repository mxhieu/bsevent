<?php

namespace App\Http\Controllers\config\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Unit;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ServiceView extends BaseAdminController
{
    public function __construct(ServiceCategory $ServiceCategory, Unit $Unit){
        parent::__construct();
        $this->ServiceCategory = $ServiceCategory;
        $this->Unit = $Unit;
    }

    public function __invoke(Request $request)
    {
        $ServiceCategoryList = $this->ServiceCategory->getServiceCategoryListByStatus('0');
        $data['ServiceCategoryList'] = $ServiceCategoryList;
        $UnitList = $this->Unit->getUnitListByStatus(0);
        $data['UnitList'] = $UnitList;
    	return view('config.service.index', $data);
    } 
}
