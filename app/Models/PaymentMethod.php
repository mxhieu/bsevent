<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paymentmethod';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of PaymentMethod
     */
    public function getPaymentMethodListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function savePaymentMethod($DataPaymentMethod){
    	$PaymentMethod = new PaymentMethod();
    	$PaymentMethodIns = $this->setPaymentMethodInfo($PaymentMethod, $DataPaymentMethod);
    	$PaymentMethodIns->save();
    }

    /**
     * update PaymentMethod infomation
     */
    public function updatePaymentMethod($InsPaymentMethod, $DataPaymentMethod){
    	$PaymentMethodIns = $this->setPaymentMethodInfo($InsPaymentMethod, $DataPaymentMethod);
    	$PaymentMethodIns->save();
    }

    /**
     * set param for save or update
     */
    private function setPaymentMethodInfo($PaymentMethod, $PaymentMethodInfo){
        $PaymentMethod->name = $PaymentMethodInfo['name'];
        $PaymentMethod->remark = $PaymentMethodInfo['remark'];
    	return $PaymentMethod;
    }
}
