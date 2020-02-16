<?php

namespace App\Http\Controllers\config\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\config\Item\AddItemRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddItemAction extends BaseAdminController
{
    /**
     * instance of Item model
     *
     * @var object
     */
    public $Item;

    public function __construct(Item $Item){
    	parent::__construct();
    	$this->Item = $Item;
    }

    public function __invoke(AddItemRequest $request)
    {
        //Clone request array
        $param = $request->all();
        $param['image'] = $this->uploadFile($request, 'image', 'item');
        $param['attach_file'] = $this->uploadFile($request, 'attach_file', 'item/file');
        $this->Item->saveItem($param);
        return redirect(route('item'))->with('result',['tabactive' => 'tab1','message' => 'The new Item added successfully!']);
    }
}
