<?php

namespace App\Http\Controllers\config\evalform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EvalFormItem;
use App\Http\Requests\config\evalform\AddEvalFormItemRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddEvalformItemAction extends BaseAdminController
{
    /**
     * instance of EvalFormItem model
     *
     * @var object
     */
    public $EvalFormItem;

    public function __construct(EvalFormItem $EvalFormItem){
    	parent::__construct();
    	$this->EvalFormItem = $EvalFormItem;
    }

    public function __invoke(AddEvalFormItemRequest $request, $id)
    {
        $param = $request->all();
        $param['evalform_id'] = $id;
        $this->EvalFormItem->saveEvalFormItem($param);
        return redirect(route('evalformitem', $id))->with('result',['tabactive' => 'tab1','message' => 'The new company representatives added successfully!']);
    }
}
