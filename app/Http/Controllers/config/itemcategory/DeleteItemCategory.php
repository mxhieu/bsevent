<?php

namespace App\Http\Controllers\config\itemcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteItemCategory extends BaseAdminController
{
    private $ItemCategory;

    public function __construct(ItemCategory $ItemCategory)
    {
        parent::__construct();
        $this->ItemCategory = $ItemCategory;
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
        $ItemCategoryInfo = $this->ItemCategory->findOrFail($id);
        $ItemCategoryInfo->is_deleted = 1;
        $ItemCategoryInfo->save();
        return redirect(route('itemcategory'))->with('result', ['tabactive' => 'tab1','message' => 'The Item Category deleted successfully!']);
    }
}
