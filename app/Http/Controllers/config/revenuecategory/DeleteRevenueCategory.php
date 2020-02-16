<?php

namespace App\Http\Controllers\config\revenuecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RevenueCategory;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteRevenueCategory extends BaseAdminController
{
    private $RevenueCategory;

    public function __construct(RevenueCategory $RevenueCategory)
    {
        parent::__construct();
        $this->RevenueCategory = $RevenueCategory;
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
        $RevenueCategoryInfo = $this->RevenueCategory->findOrFail($id);
        $RevenueCategoryInfo->is_deleted = 1;
        $RevenueCategoryInfo->save();
        return redirect(route('revenuecategory'))->with('result', ['tabactive' => 'tab1','message' => 'The Revenue Category deleted successfully!']);
    }
}
