<?php

namespace App\Http\Controllers\config\department\itemgroup\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailItemGroupCategory;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteDetailItemGroupCategory extends BaseAdminController
{
    private $DetailItemGroupCategory;

    public function __construct(DetailItemGroupCategory $DetailItemGroupCategory)
    {
        parent::__construct();
        $this->DetailItemGroupCategory = $DetailItemGroupCategory;
    }

    /**
     * Remove detail item group
     *
     * @param   [int]  $ItemId  item id
     * @param   [int]  $CateId  detail itemgroup category
     *
     * @return  [mix]           return to detailitemgroupcategoryview
     */
    public function __invoke($CateId)
    {
        $ItemGroupInfo = $this->DetailItemGroupCategory->findOrFail($CateId);
        $ItemGroupInfo->is_deleted = 1;
        $ItemGroupInfo->save();
        return redirect(route('detailitemgroupcategoryview', $ItemGroupInfo->ItemGroup->id))->with('result', ['tabactive' => 'tab1','message' => 'The ItemGroup deleted successfully!']);
    }
}
