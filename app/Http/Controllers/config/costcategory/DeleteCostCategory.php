<?php

namespace App\Http\Controllers\config\costcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CostCategory;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteCostCategory extends BaseAdminController
{
    private $CostCategory;

    public function __construct(CostCategory $CostCategory)
    {
        parent::__construct();
        $this->CostCategory = $CostCategory;
    }

    /**
     * Soft delete CostCategory
     *
     * @param   int  $id  id of CostCategory
     *
     * @return  [type]       redirect to company view
     */
    public function __invoke($id)
    {
        $CostCategoryInfo = $this->CostCategory->findOrFail($id);
        $CostCategoryInfo->is_deleted = 1;
        $CostCategoryInfo->save();
        return redirect(route('costcategory'))->with('result', ['tabactive' => 'tab1','message' => 'The cost category deleted successfully!']);
    }
}
