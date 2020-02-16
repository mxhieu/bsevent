<?php

namespace App\Http\Controllers\config\costcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CostCategory;
use App\Http\Requests\config\CostCategory\AddCostCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddCostCategoryAction extends BaseAdminController
{
    /**
     * instance of CostCategory model
     *
     * @var object
     */
    public $CostCategory;

    public function __construct(CostCategory $CostCategory){
    	parent::__construct();
    	$this->CostCategory = $CostCategory;
    }

    public function __invoke(AddCostCategoryRequest $request)
    {
        $this->CostCategory->saveCostCategory($request->all());
        return redirect(route('costcategory'))->with('result',['tabactive' => 'tab1','message' => 'The new cost category added successfully!']);
    }
}
