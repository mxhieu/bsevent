<?php

namespace App\Http\Controllers\config\itemcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Http\Requests\config\ItemCategory\AddItemCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddItemCategoryAction extends BaseAdminController
{
    /**
     * instance of ItemCategory model
     *
     * @var object
     */
    public $ItemCategory;

    public function __construct(ItemCategory $ItemCategory){
    	parent::__construct();
    	$this->ItemCategory = $ItemCategory;
    }

    public function __invoke(AddItemCategoryRequest $request)
    {
        $this->ItemCategory->saveItemCategory($request->all());
        return redirect(route('itemcategory'))->with('result',['tabactive' => 'tab1','message' => 'The new Item Category added successfully!']);
    }
}
