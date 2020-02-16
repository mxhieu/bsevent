<?php

namespace App\Http\Controllers\config\revenuecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RevenueCategory;
use Session;
use App\Http\Requests\config\RevenueCategory\EditRevenueCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditRevenueCategory extends BaseAdminController
{
    /**
     * Instance of RevenueCategory model
     *
     * @var [type]
     */
    private $RevenueCategory;

    public function __construct(RevenueCategory $RevenueCategory){
    	parent::__construct();
    	$this->RevenueCategory = $RevenueCategory;
    }

    public function __invoke($id, EditRevenueCategoryRequest $request)
    {
        $RevenueCategoryInfo = $this->RevenueCategory->findOrFail($id);
        $data['RevenueCategoryInfo'] = $RevenueCategoryInfo;
        if($request->isMethod('post'))
        {
            $this->RevenueCategory->updateRevenueCategory($RevenueCategoryInfo, $request->all());
            return redirect(route('revenuecategory'))->with('result',['tabactive' => 'tab1','message' => 'The Revenue Category updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.RevenueCategory.index', $data);
    }
}
