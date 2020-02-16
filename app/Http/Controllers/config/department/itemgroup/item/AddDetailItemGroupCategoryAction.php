<?php

namespace App\Http\Controllers\config\department\itemgroup\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailItemGroupCategory;
use App\Http\Requests\config\department\itemgroup\item\AddDetailItemGroupCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddDetailItemGroupCategoryAction extends BaseAdminController
{
    /**
     * instance of DetailItemGroupCategory model
     *
     * @var object
     */
    public $DetailItemGroupCategory;

    public function __construct(DetailItemGroupCategory $DetailItemGroupCategory){
    	parent::__construct();
    	$this->DetailItemGroupCategory = $DetailItemGroupCategory;
    }

    public function __invoke($itemGroupId, AddDetailItemGroupCategoryRequest $request)
    {
        $param = $request->all();
        $param['item_group_id'] = $itemGroupId;
        $this->DetailItemGroupCategory->create($param);
        return redirect(route('detailitemgroupcategoryview', $itemGroupId))->with('result',['tabactive' => 'tab1','message' => 'The new group added successfully!']);
    }   
}
