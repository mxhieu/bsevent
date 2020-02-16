<?php

namespace App\Http\Controllers\config\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Session;
use App\Http\Requests\config\Item\EditItemRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;
use App\Models\ItemCategory;
use App\Models\Unit;

class EditItem extends BaseAdminController
{
    /**
     * Instance of Item model
     *
     * @var [type]
     */
    private $Item;

    public function __construct(Item $Item, ItemCategory $ItemCategory, Unit $Unit){
    	parent::__construct();
        $this->Item = $Item;
        $this->ItemCategory = $ItemCategory;
        $this->Unit = $Unit;
    }

    public function __invoke($id, EditItemRequest $request)
    {
        $ItemCategoryList = $this->ItemCategory->getItemCategoryListByStatus('0');
        $data['ItemCategoryList'] = $ItemCategoryList;
        $UnitList = $this->Unit->getUnitListByStatus(0);
        $data['UnitList'] = $UnitList;
        $ItemInfo = $this->Item->findOrFail($id);
        $data['ItemInfo'] = $ItemInfo;
        if($request->isMethod('post'))
        {
            $param = $request->all();
            //Set logo if not change
            $param['image'] = $this->CheckUpdateField($request, $ItemInfo->image, 'image', 'item');
            $param['attach_file'] = $this->CheckUpdateField($request, $ItemInfo->attach_file, 'attach_file', 'item/file');
            $this->Item->updateItem($ItemInfo, $param);
            return redirect(route('item'))->with('result',['tabactive' => 'tab1','message' => 'The Item updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.item.index', $data);
    }
}
