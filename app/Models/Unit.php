<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Unit';
    
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
     * @return  collection    list collection of Unit
     */
    public function getUnitListByStatus($status){
        return $this->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveUnit($DataUnit){
    	$Unit = new Unit();
    	$UnitIns = $this->setUnitInfo($Unit, $DataUnit);
    	$UnitIns->save();
    }

    /**
     * update Unit infomation
     */
    public function updateUnit($InsUnit, $DataUnit){
    	$UnitIns = $this->setUnitInfo($InsUnit, $DataUnit);
    	$UnitIns->save();
    }

    /**
     * set param for save or update
     */
    private function setUnitInfo($Unit, $UnitInfo){
        $Unit->name = $UnitInfo['name'];
        $Unit->remark = $UnitInfo['remark'];
    	return $Unit;
    }
}
