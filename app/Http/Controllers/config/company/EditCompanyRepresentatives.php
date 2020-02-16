<?php

namespace App\Http\Controllers\config\company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyRepresentatives;
use Session;
use App\Http\Requests\config\company\EditCompanyRepresentativesRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditCompanyRepresentatives extends BaseAdminController
{

    private $CompanyRepresentatives;

    /**
     * EditCompanyRepresentatives contructor
     */
    public function __construct(CompanyRepresentatives $CompanyRepresentatives){
        parent::__construct();
        $this->CompanyRepresentatives = $CompanyRepresentatives;
    }

    /**
     * Update company representative
     *
     * @param   int                             $id       id of Representative
     * @param   EditCompanyRepresentativesRequest  $request  request form EditCompanyRepresentativesRequest
     *
     * @return  [type]                                       [return description]
     */
    public function __invoke($id, EditCompanyRepresentativesRequest $request)
    {
        $editRepresentatives = $this->CompanyRepresentatives->find($id);
        
        if($request->isMethod('post'))
        {
            $this->CompanyRepresentatives->updateCompanyRepresentatives($id, $request->all());
            return redirect(route('company'))->with('result',['tabactive' => 'tab2','message' => 'The company representatives updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        $data['editRepresentatives'] = $editRepresentatives;
        return view('config.company.index', $data);
    }
}
