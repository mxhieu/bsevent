<?php

namespace App\Http\Controllers\config\department\itemgroup\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailItemGroupCategory;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditDetailItemGroupCategory extends BaseAdminController
{
    /**
     * Instance of ItemGroup model
     *
     * @var [type]
     */
    private $DetailItemGroupCategory;

    public function __construct(DetailItemGroupCategory $DetailItemGroupCategory){
    	parent::__construct();
        $this->DetailItemGroupCategory = $DetailItemGroupCategory;
    }
    
    public function __invoke($CateId, Request $request)
    {
        $DetailItemGroupCategoryInfo = $this->DetailItemGroupCategory->findOrFail($CateId);
        $DetailItemGroupCategoryInfo->fill($request->all());
        $DetailItemGroupCategoryInfo->save();
        return redirect(route('detailitemgroupcategoryview', $DetailItemGroupCategoryInfo->item_group_id))->with('result',['tabactive' => 'tab1','message' => 'The group updated successfully!']);
    }
}
