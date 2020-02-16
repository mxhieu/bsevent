<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'position';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Employee relationship
     *
     * @return  [type]  [return description]
     */
    public function Employee(){
        return $this->hasMany('App\Models\Employee', 'position_id', 'id')->where('is_deleted', 0);
    }

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of Position
     */
    public function getPositionListByStatus($status){
        return $this->with('Employee')->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function savePosition($DataPosition){
    	$Position = new Position();
    	$PositionIns = $this->setPositionInfo($Position, $DataPosition);
    	$PositionIns->save();
    }

    /**
     * update Position infomation
     */
    public function updatePosition($InsPosition, $DataPosition){
    	$PositionIns = $this->setPositionInfo($InsPosition, $DataPosition);
    	$PositionIns->save();
    }

    /**
     * set param for save or update
     */
    private function setPositionInfo($Position, $PositionInfo){
        $Position->name = $PositionInfo['name'];
        $Position->remark = $PositionInfo['remark'];
    	return $Position;
    }
}
