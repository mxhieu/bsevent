<?php

namespace App\Http\Controllers\config\company;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\config\company\EditCompanyRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class editCompanyAction extends BaseAdminController
{
    /**
     * instance of company model
     *
     * @var object
     */
    public $Company;

    /**
     * Edit company contructor
     */
    public function __construct(Company $Company){
        parent::__construct();
        $this->Company = $Company;
    }

    /**
     * edit company config
     *
     * @param   Request  $request  request form company view
     *
     * @return  [type]             redirect to company view
     */
    public function __invoke(EditCompanyRequest $request)
    {
        $CompanyInfo = $this->Company->find(1);
        //Clone request all
        $param = $request->all();
        //Set logo if it isn't change
        if(!empty($CompanyInfo))
            $param['logo'] = $CompanyInfo->logo;
        //if logo is change, old image will delete
        if($request->hasFile('logo'))
        {
            if(!empty($CompanyInfo->logo))
            {
                $this->DeleteImageInFolder($CompanyInfo->logo,'company');
            }
            $param['logo'] = $this->uploadFile($request, 'logo', 'company');
        }
        //Update company info
        $this->Company->updateOrCreate(['id'=>'1'], $param);
        return redirect(route('company'));
    }
}
