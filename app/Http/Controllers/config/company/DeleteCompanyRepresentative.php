<?php

namespace App\Http\Controllers\config\company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyRepresentatives;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteCompanyRepresentative extends BaseAdminController
{
    private $CompanyRepresentatives;

    public function __construct(CompanyRepresentatives $CompanyRepresentatives)
    {
        parent::__construct();
        $this->CompanyRepresentatives = $CompanyRepresentatives;
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
        $CompanyRepresentative = $this->CompanyRepresentatives->findOrFail($id);
        $CompanyRepresentative->is_deleted = 1;
        $CompanyRepresentative->save();
        return redirect(route('company'))->with('result', ['tabactive' => 'tab2','message' => 'The company representative deleted successfully!']);
    }
}
