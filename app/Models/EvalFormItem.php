<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvalFormItem extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evalformitem';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function form(){
        return $this->belongsTo('App\Models\EvalForm','evalform_id','id');
    }

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of EvalFormItem
     */
    public function getEvalFormItemListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function getEvalItemById($EvalFormId){
        return $this->where('is_deleted', 0)->where('evalform_id', $EvalFormId)->orderBy('created_at','desc')->get();
    }

    public function saveEvalFormItem($DataEvalFormItem){
    	$EvalFormItem = new EvalFormItem();
    	$EvalFormItemIns = $this->setEvalFormItemInfo($EvalFormItem, $DataEvalFormItem);
    	$EvalFormItemIns->save();
    }

    /**
     * update EvalFormItem infomation
     */
    public function updateEvalFormItem($InsEvalFormItem, $DataEvalFormItem){
    	$EvalFormItemIns = $this->setEvalFormItemInfo($InsEvalFormItem, $DataEvalFormItem);
    	$EvalFormItemIns->save();
    }

    /**
     * set param for save or update
     */
    private function setEvalFormItemInfo($EvalFormItem, $EvalFormItemInfo){
        $EvalFormItem->name = $EvalFormItemInfo['name'];
        $EvalFormItem->code = $EvalFormItemInfo['code'];
        $EvalFormItem->parent_id = $EvalFormItemInfo['parent_id'];
        $EvalFormItem->type = $EvalFormItemInfo['type'];
        $EvalFormItem->content = $EvalFormItemInfo['content'];
        $EvalFormItem->evalform_id = $EvalFormItemInfo['evalform_id'];
        $EvalFormItem->remark = $EvalFormItemInfo['remark'];
    	return $EvalFormItem;
    }
}
