<?php

namespace App\Http\Controllers\config\itemcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use Session;
use App\Http\Requests\config\ItemCategory\EditItemCategoryRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditItemCategory extends BaseAdminController
{
    /**
     * Instance of ItemCategory model
     *
     * @var [type]
     */
    private $ItemCategory;

    public function __construct(ItemCategory $ItemCategory){
    	parent::__construct();
    	$this->ItemCategory = $ItemCategory;
    }

    public function __invoke($id, EditItemCategoryRequest $request)
    {
        $ItemCategoryInfo = $this->ItemCategory->findOrFail($id);
        $data['ItemCategoryInfo'] = $ItemCategoryInfo;
        if($request->isMethod('post'))
        {
            $this->ItemCategory->updateItemCategory($ItemCategoryInfo, $request->all());
            return redirect(route('itemcategory'))->with('result',['tabactive' => 'tab1','message' => 'The ItemCategory updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.ItemCategory.index', $data);
    }
}
