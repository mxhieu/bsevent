<?php

namespace App\Http\Controllers\config\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Models\Unit;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ItemView extends BaseAdminController
{

    private $ItemCategory, $Unit;

    public function __construct(ItemCategory $ItemCategory, Unit $Unit){
        parent::__construct();
        $this->ItemCategory = $ItemCategory;
        $this->Unit = $Unit;
    }

    public function __invoke(Request $request)
    {
        $ItemCategoryList = $this->ItemCategory->getItemCategoryListByStatus('0');
        $data['ItemCategoryList'] = $ItemCategoryList;
        $UnitList = $this->Unit->getUnitListByStatus(0);
        $data['UnitList'] = $UnitList;
        return view('config.item.index', $data);
    }
}
