<?php

namespace App\Http\Controllers\config\taxcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TaxCategory;
use App\Http\Requests\config\TaxCategory\AddTaxCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddTaxCategoryAction extends BaseAdminController
{
    /**
     * instance of TaxCategory model
     *
     * @var object
     */
    public $TaxCategory;

    public function __construct(TaxCategory $TaxCategory){
    	parent::__construct();
    	$this->TaxCategory = $TaxCategory;
    }

    public function __invoke(AddTaxCategoryRequest $request)
    {
        $this->TaxCategory->saveTaxCategory($request->all());
        return redirect(route('taxcategory'))->with('result',['tabactive' => 'tab1','message' => 'The new Tax Category added successfully!']);
    }
}
