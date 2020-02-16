<?php

namespace App\Http\Controllers\config\company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyRepresentatives;
use App\Http\Requests\config\company\AddCompanyRepresentativesRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddCompanyRepresentativesAction extends BaseAdminController
{
    /**
     * instance of CompanyRepresentatives
     *
     * @var object
     */
    public $CompanyRepresentatives;

    /**
     * AddCompanyRepresentativesAction contructor
     */
    public function __construct(CompanyRepresentatives $CompanyRepresentatives){
        parent::__construct();
        $this->CompanyRepresentatives = $CompanyRepresentatives;
    }

    /**
     * Add company representatives
     *
     * @param   Request  $request  request from company view
     *
     * @return  [type]             redirect to company view
     */
    public function __invoke(AddCompanyRepresentativesRequest $request)
    {
        $this->CompanyRepresentatives->addCompanyRepresentatives($request->all());
        return redirect(route('company'))->with('result',['tabactive' => 'tab2','message' => 'The new company representatives added successfully!']);
    }
}
