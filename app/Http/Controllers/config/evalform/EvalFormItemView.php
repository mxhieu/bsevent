<?php

namespace App\Http\Controllers\config\evalform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EvalFormItem;
use App\Models\EvalForm;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EvalFormItemView extends BaseAdminController
{

    private $EvalForm, $EvalFormItem, $HtmlOption;

    public function __construct(EvalFormItem $EvalFormItem, EvalForm $EvalForm){
    	parent::__construct();
        $this->EvalFormItem = $EvalFormItem;
        $this->EvalForm = $EvalForm;
    }

    public function __invoke($id)
    {
        $EvalItemList = $this->EvalFormItem->getEvalItemById($id);
        $data['HtmlOptionItem'] = ($this->RecursiveItem($EvalItemList, 0));
        $data['EvalFormItemType'] = $this->BaseConfig['EvalFormItemType'];
        $data['EvalFormInfo'] = $this->EvalForm->findOrFail($id);
        return view('config.evalformitem.index', $data);
    }

    public function RecursiveItem($Data, $ParentId, $prefix = ''){
        foreach($Data as $val)
        {
            if($val->parent_id == $ParentId)
            {
                $this->HtmlOption .= '<option value="'.$val->id.'">'.$prefix.$val->name.'</option>';
                $this->RecursiveItem($Data, $val->id, $prefix.'--');
            }
        }
        return $this->HtmlOption;
    }
}
