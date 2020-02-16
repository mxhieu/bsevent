<?php

namespace App\Http\Controllers\config\revenuecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RevenueCategory;
use App\Http\Requests\config\RevenueCategory\AddRevenueCategoryRequest;;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddRevenueCategoryAction extends BaseAdminController
{
    /**
     * instance of RevenueCategory model
     *
     * @var object
     */
    public $RevenueCategory;

    public function __construct(RevenueCategory $RevenueCategory){
    	parent::__construct();
    	$this->RevenueCategory = $RevenueCategory;
    }

    public function __invoke(AddRevenueCategoryRequest $request)
    {
        $this->RevenueCategory->saveRevenueCategory($request->all());
        return redirect(route('revenuecategory'))->with('result',['tabactive' => 'tab1','message' => 'The new Revenue Category added successfully!']);
    }
}
