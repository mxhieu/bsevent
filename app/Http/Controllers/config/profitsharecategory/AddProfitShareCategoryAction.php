<?php

namespace App\Http\Controllers\config\profitsharecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfitShareCategory;
use App\Http\Requests\config\ProfitShareCategory\AddProfitShareCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddProfitShareCategoryAction extends BaseAdminController
{
    /**
     * instance of ProfitShareCategory model
     *
     * @var object
     */
    public $ProfitShareCategory;

    public function __construct(ProfitShareCategory $ProfitShareCategory){
    	parent::__construct();
    	$this->ProfitShareCategory = $ProfitShareCategory;
    }

    public function __invoke(AddProfitShareCategoryRequest $request)
    {
        $this->ProfitShareCategory->saveProfitShareCategory($request->all());
        return redirect(route('profitsharecategory'))->with('result',['tabactive' => 'tab1','message' => 'The new ProfitShare Category added successfully!']);
    }
}
