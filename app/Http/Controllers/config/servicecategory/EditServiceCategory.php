<?php

namespace App\Http\Controllers\config\servicecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Session;
use App\Http\Requests\config\ServiceCategory\EditServiceCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditServiceCategory extends BaseAdminController
{
    /**
     * Instance of ServiceCategory model
     *
     * @var [type]
     */
    private $ServiceCategory;

    public function __construct(ServiceCategory $ServiceCategory){
    	parent::__construct();
    	$this->ServiceCategory = $ServiceCategory;
    }

    public function __invoke($id, EditServiceCategoryRequest $request)
    {
        $ServiceCategoryInfo = $this->ServiceCategory->findOrFail($id);
        $data['ServiceCategoryInfo'] = $ServiceCategoryInfo;
        if($request->isMethod('post'))
        {
            $this->ServiceCategory->updateServiceCategory($ServiceCategoryInfo, $request->all());
            return redirect(route('servicecategory'))->with('result',['tabactive' => 'tab1','message' => 'The Tax Category updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.ServiceCategory.index', $data);
    }
}