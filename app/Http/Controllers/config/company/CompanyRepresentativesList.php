<?php

namespace App\Http\Controllers\config\company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyRepresentatives;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class CompanyRepresentativesList extends BaseAdminController
{

    private $CompanyRepresentatives;
    /**
     * CompanyView contructor
     */
    public function __construct(CompanyRepresentatives $CompanyRepresentatives){
        parent::__construct();
        $this->CompanyRepresentatives = $CompanyRepresentatives;
    }

    /**
     * company view
     *
     * @return  view  view of company config
     */
    public function __invoke()
    {
        $CompanyRepresentatives = $this->CompanyRepresentatives->getCompanyRepresensatives();
        return Datatables::of($CompanyRepresentatives)
        ->addColumn('action', function ($CompanyRepresentatives) {
                return '<a title="Edit" href="'.route('editcompanyrepresentatives',$CompanyRepresentatives->id).'" class="btn btn-info">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                    </a>
                    <a title="Delete" href="'.route('deletecompanyrepresentative', $CompanyRepresentatives->id).'" class="btn btn-danger delete_confirm">
                        <i class="fa fa-trash" aria-hidden="true"></i> 
                    </a>
                    ';
        })
        ->make(true);
    }
}
