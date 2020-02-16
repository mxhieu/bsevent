<?php

namespace App\Http\Controllers\config\department\itemgroup\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\DetailItemGroupCategory;
use App\Models\DetailItemGroup;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddItemList extends BaseAdminController
{
    public function __construct(Item $Item, DetailItemGroupCategory $DetailItemGroupCategory, DetailItemGroup $DetailItemGroup){
        parent::__construct();
        $this->Item = $Item;
        $this->DetailItemGroupCategory = $DetailItemGroupCategory;
        $this->DetailItemGroup = $DetailItemGroup;
    }

    public function __invoke($ItemGroupCategoryId)
    {
        $arrayItemIdSelected = $this->DetailItemGroup->getItemListByCategoryId($ItemGroupCategoryId)->toArray();
        $ItemList = $this->Item->getItemNotSelected($arrayItemIdSelected);
        $DetailItemGroupCategoryInfo = $this->DetailItemGroupCategory->find($ItemGroupCategoryId);
        $data = [
            'ItemList' => $ItemList,
            'DetailItemGroupCategoryInfo' => $DetailItemGroupCategoryInfo
        ];
        return view('config.department.itemgroup.item.additemlist',$data);
    }
}
