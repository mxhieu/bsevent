<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bank';
    
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
     * @return  collection    list collection of Bank
     */
    public function getBankListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveBank($DataBank){
    	$Bank = new Bank();
    	$BankIns = $this->setBankInfo($Bank, $DataBank);
    	$BankIns->save();
    }

    /**
     * update Bank infomation
     */
    public function updateBank($InsBank, $DataBank){
    	$BankIns = $this->setBankInfo($InsBank, $DataBank);
    	$BankIns->save();
    }

    /**
     * set param for save or update
     */
    private function setBankInfo($Bank, $BankInfo){
        $Bank->name = $BankInfo['name'];
        $Bank->remark = $BankInfo['remark'];
    	return $Bank;
    }
}
