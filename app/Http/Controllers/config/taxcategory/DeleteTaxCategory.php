<?php

namespace App\Http\Controllers\config\taxcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TaxCategory;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteTaxCategory extends BaseAdminController
{
    private $TaxCategory;

    public function __construct(TaxCategory $TaxCategory)
    {
        parent::__construct();
        $this->TaxCategory = $TaxCategory;
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
        $TaxCategoryInfo = $this->TaxCategory->findOrFail($id);
        $TaxCategoryInfo->is_deleted = 1;
        $TaxCategoryInfo->save();
        return redirect(route('taxcategory'))->with('result', ['tabactive' => 'tab1','message' => 'The Tax Category deleted successfully!']);
    }
}
