<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function ServiceCategory(){
        return $this->belongsTo('App\Models\ServiceCategory','servicecategory_id','id');
    }

    public function Unit(){
        return $this->belongsTo('App\Models\Unit','unit_id','id');
    }

    /**
     * get all data in this table by status
     *
     * @param   int  $status  status of is_delete
     *
     * @return  collection    list collection of Service
     */
    public function getServiceListByStatus($status){
        return $this->with('ServiceCategory','Unit')->where('is_deleted', $status)->orderBy('created_at','desc')->get();
    }

    public function saveService($DataService){
        $Service = new Service();
        $ServiceIns = $this->setServiceInfo($Service, $DataService);        
        $ServiceIns->save();
    }

    /**
     * update Service infomation
     */
    public function updateService($InsService, $DataService){
    	$ServiceIns = $this->setServiceInfo($InsService, $DataService);
    	$ServiceIns->save();
    }

    /**
     * set param for save or update
     */
    private function setServiceInfo($Service, $ServiceInfo){
        $Service->name = $ServiceInfo['name'];
        $Service->code = $ServiceInfo['code'];
        $Service->image = $ServiceInfo['image'];
        $Service->unit_id = $ServiceInfo['unit_id'];
        $Service->servicecategory_id = $ServiceInfo['servicecategory_id'];
        $Service->lead_time = $ServiceInfo['lead_time'];
        $Service->attach_file = $ServiceInfo['attach_file'];
        $Service->remark = $ServiceInfo['remark'];
    	return $Service;
    }
}
