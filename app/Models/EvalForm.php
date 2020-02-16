<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvalForm extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evalform';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function item(){
        return $this->hasMany('App\Models\EvalItem','evalform_id','id');
    }

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of EvalForm
     */
    public function getEvalFormListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveEvalForm($DataEvalForm){
    	$EvalForm = new EvalForm();
    	$EvalFormIns = $this->setEvalFormInfo($EvalForm, $DataEvalForm);
    	$EvalFormIns->save();
    }

    /**
     * update EvalForm infomation
     */
    public function updateEvalForm($InsEvalForm, $DataEvalForm){
    	$EvalFormIns = $this->setEvalFormInfo($InsEvalForm, $DataEvalForm);
    	$EvalFormIns->save();
    }

    /**
     * set param for save or update
     */
    private function setEvalFormInfo($EvalForm, $EvalFormInfo){
        $EvalForm->name = $EvalFormInfo['name'];
        $EvalForm->code = $EvalFormInfo['code'];
        $EvalForm->remark = $EvalFormInfo['remark'];
    	return $EvalForm;
    }
}
