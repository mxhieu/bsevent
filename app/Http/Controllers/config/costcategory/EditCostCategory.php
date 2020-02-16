<?php

namespace App\Http\Controllers\config\costcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CostCategory;
use Session;
use App\Http\Requests\config\CostCategory\EditCostCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditCostCategory extends BaseAdminController
{
    /**
     * Instance of CostCategory model
     *
     * @var [type]
     */
    private $CostCategory;

    public function __construct(CostCategory $CostCategory){
    	parent::__construct();
    	$this->CostCategory = $CostCategory;
    }

    public function __invoke($id, EditCostCategoryRequest $request)
    {
        $CostCategoryInfo = $this->CostCategory->findOrFail($id);
        $data['CostCategoryInfo'] = $CostCategoryInfo;
        if($request->isMethod('post'))
        {
            $this->CostCategory->updateCostCategory($CostCategoryInfo, $request->all());
            return redirect(route('costcategory'))->with('result',['tabactive' => 'tab1','message' => 'The cost category updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.costcategory.index', $data);
    }
}
