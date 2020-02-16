<?php

namespace App\Http\Controllers\config\servicecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Http\Requests\config\ServiceCategory\AddServiceCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddServiceCategoryAction extends BaseAdminController
{
    /**
     * instance of ServiceCategory model
     *
     * @var object
     */
    public $ServiceCategory;

    public function __construct(ServiceCategory $ServiceCategory){
    	parent::__construct();
    	$this->ServiceCategory = $ServiceCategory;
    }

    public function __invoke(AddServiceCategoryRequest $request)
    {
        $this->ServiceCategory->saveServiceCategory($request->all());
        return redirect(route('servicecategory'))->with('result',['tabactive' => 'tab1','message' => 'The new service category added successfully!']);
    }
}
