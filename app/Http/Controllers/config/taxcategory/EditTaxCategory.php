<?php

namespace App\Http\Controllers\config\taxcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TaxCategory;
use Session;
use App\Http\Requests\config\TaxCategory\EditTaxCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditTaxCategory extends BaseAdminController
{
    /**
     * Instance of TaxCategory model
     *
     * @var [type]
     */
    private $TaxCategory;

    public function __construct(TaxCategory $TaxCategory){
    	parent::__construct();
    	$this->TaxCategory = $TaxCategory;
    }

    public function __invoke($id, EditTaxCategoryRequest $request)
    {
        $TaxCategoryInfo = $this->TaxCategory->findOrFail($id);
        $data['TaxCategoryInfo'] = $TaxCategoryInfo;
        if($request->isMethod('post'))
        {
            $this->TaxCategory->updateTaxCategory($TaxCategoryInfo, $request->all());
            return redirect(route('taxcategory'))->with('result',['tabactive' => 'tab1','message' => 'The Tax Category updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.taxcategory.index', $data);
    }
}
