<?php

namespace App\Http\Controllers\config\department\itemgroup\item;

use Illuminate\Http\Request;
use App\Models\DetailItemGroup;
use App\Models\DetailItemGroupCategory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddDetailItemGroupAction extends BaseAdminController
{
    public $ItemGroup;

    public function __construct(DetailItemGroup $DetailItemGroup, DetailItemGroupCategory $DetailItemGroupCategory){
    	parent::__construct();
        $this->DetailItemGroup = $DetailItemGroup;
        $this->DetailItemGroupCategory = $DetailItemGroupCategory;
    }

    public function __invoke($DetailItemGroupCategoryId ,Request $request)
    {
        $ItemGroupInfo = $this->DetailItemGroupCategory->findOrFail($DetailItemGroupCategoryId)->ItemGroup;
        $arrItemId = $request->post('item_id');
        foreach($arrItemId as $row)
        {   
            $dataInsert[] = [
                'detail_item_group_category_id' => $DetailItemGroupCategoryId,
                'item_id' => $row
            ];
        }
        $this->DetailItemGroup->insert($dataInsert);
        return redirect(route('detailitemgroupcategoryview', $ItemGroupInfo->id))->with('result',['tabactive' => 'tab1','message' => 'The new group added successfully!']);
    }   
}
