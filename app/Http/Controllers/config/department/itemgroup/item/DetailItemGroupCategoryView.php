<?php

namespace App\Http\Controllers\config\department\itemgroup\item;

use Illuminate\Http\Request;
use App\Models\DetailItemGroupCategory;
use App\Http\Controllers\Controller;
use App\Models\ItemGroup;
use Session;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DetailItemGroupCategoryView extends BaseAdminController
{
    public function __construct(DetailItemGroupCategory $DetailItemGroupCategory, ItemGroup $ItemGroup){
    	parent::__construct();
        $this->DetailItemGroupCategory = $DetailItemGroupCategory;
        $this->ItemGroup = $ItemGroup;
    }

    public function __invoke($itemGroupId)
    {
        $EditDetailItemGroupCategory = [];
        if(!empty(request('CateId')))
        {
            $EditDetailItemGroupCategory = $this->DetailItemGroupCategory->findOrFail(request('CateId'));
            if(!Session::has('result'))
            {
                Session::flash('result',['tabactive' => 'tab2']);
            }
        }
        $ItemGroupInfo = $this->ItemGroup->findOrFail($itemGroupId);
        $DetailItemGroupCategory = $this->DetailItemGroupCategory->getItemListByItemGroup( $itemGroupId );
        $data = [
            'ItemGroupInfo' => $ItemGroupInfo,
            'DetailItemGroupCategory' => $DetailItemGroupCategory,
            'EditDetailItemGroupCategory' => $EditDetailItemGroupCategory
        ];
        return view('config.department.itemgroup.item.index',$data);
    }
}
