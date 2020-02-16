<?php

namespace App\Http\Controllers\config\profitsharecategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfitShareCategory;
use Session;
use App\Http\Requests\config\ProfitShareCategory\EditProfitShareCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditProfitShareCategory extends BaseAdminController
{
    /**
     * Instance of ProfitShareCategory model
     *
     * @var [type]
     */
    private $ProfitShareCategory;

    public function __construct(ProfitShareCategory $ProfitShareCategory){
    	parent::__construct();
    	$this->ProfitShareCategory = $ProfitShareCategory;
    }

    public function __invoke($id, EditProfitShareCategoryRequest $request)
    {
        $ProfitShareCategoryInfo = $this->ProfitShareCategory->findOrFail($id);
        $data['ProfitShareCategoryInfo'] = $ProfitShareCategoryInfo;
        if($request->isMethod('post'))
        {
            $this->ProfitShareCategory->updateProfitShareCategory($ProfitShareCategoryInfo, $request->all());
            return redirect(route('profitsharecategory'))->with('result',['tabactive' => 'tab1','message' => 'The ProfitShareCategory updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.profitsharecategory.index', $data);
    }
}
