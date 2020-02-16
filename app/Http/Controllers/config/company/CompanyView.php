<?php

namespace App\Http\Controllers\config\company;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class CompanyView extends BaseAdminController
{
    /**
     * CompanyView contructor
     */
    public function __construct(){
    	parent::__construct();
    }

    /**
     * company view
     *
     * @return  view  view of company config
     */
    public function __invoke()
    {
        $companyInfo = Company::find(1);
        $data['companyInfo'] = $companyInfo;
        return view('config.company.index', $data);
    }
}
