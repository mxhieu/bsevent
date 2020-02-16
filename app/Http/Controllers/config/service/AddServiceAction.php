<?php

namespace App\Http\Controllers\config\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\config\Service\AddServiceRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddServiceAction extends BaseAdminController
{
    /**
     * instance of Service model
     *
     * @var object
     */
    public $Service;

    public function __construct(Service $Service){
    	parent::__construct();
    	$this->Service = $Service;
    }

    public function __invoke(AddServiceRequest $request)
    {
        //Clone request array
        $param = $request->all();
        $param['image'] = $this->uploadFile($request, 'image', 'service');
        $param['attach_file'] = $this->uploadFile($request, 'attach_file', 'service/file');
        $this->Service->saveService($param);
        return redirect(route('service'))->with('result',['tabactive' => 'tab1','message' => 'The new Service added successfully!']);
    }
}
