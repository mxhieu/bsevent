<?php

namespace App\Http\Controllers\config\department\itemgroup\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailItemGroup;
use App\Models\DetailItemGroupCategory;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteDetailItemGroup extends BaseAdminController
{
    private $DetailItemGroup, $DetailItemGroupCategory;

    public function __construct(DetailItemGroup $DetailItemGroup, DetailItemGroupCategory $DetailItemGroupCategory)
    {
        parent::__construct();
        $this->DetailItemGroup = $DetailItemGroup;
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
    public function __invoke($ItemId, $CateId)
    {
        $ItemGroupInfo = $this->DetailItemGroupCategory->findOrFail($CateId)->ItemGroup;
        $this->DetailItemGroup->DeleteDetailItemGroup($ItemId, $CateId);
        return redirect(route('detailitemgroupcategoryview', $ItemGroupInfo->id))->with('result', ['tabactive' => 'tab1','message' => 'The ItemGroup deleted successfully!']);
    }
}
