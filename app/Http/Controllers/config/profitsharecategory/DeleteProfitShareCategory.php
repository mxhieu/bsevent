<?php

namespace App\Http\Controllers\config\profitsharecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfitShareCategory;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteProfitShareCategory extends BaseAdminController
{
    private $ProfitShareCategory;

    public function __construct(ProfitShareCategory $ProfitShareCategory)
    {
        parent::__construct();
        $this->ProfitShareCategory = $ProfitShareCategory;
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
        $ProfitShareCategoryInfo = $this->ProfitShareCategory->findOrFail($id);
        $ProfitShareCategoryInfo->is_deleted = 1;
        $ProfitShareCategoryInfo->save();
        return redirect(route('profitsharecategory'))->with('result', ['tabactive' => 'tab1','message' => 'The Profit ShareCategory deleted successfully!']);
    }
}
