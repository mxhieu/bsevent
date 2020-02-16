<?php

namespace App\Http\Controllers\config\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ServiceList extends BaseAdminController
{
    public function __construct(Service $Service){
    	parent::__construct();
    	$this->Service = $Service;
    }

    public function __invoke()
    {
        $ServiceList = $this->Service->getServiceListByStatus(0);
        foreach($ServiceList as $row)
        {
            $row->unit_name = $row->Unit->name;
        }
        return Datatables::of($ServiceList)
        ->addColumn('name_link', function ($ServiceList) {
            return '<a href="'.route('editservice', $ServiceList->id).'">'.$ServiceList->name.'</a>';
        })
        ->addColumn('category_link', function ($ServiceList) {
            return '<a href="'.route('editservicecategory',$ServiceList->ServiceCategory->id).'">'.$ServiceList->ServiceCategory->name.'</a>';
        })
        ->addColumn('image', function ($ServiceList) {
            return '<img class="data_image_list" src="'.url('/upload/service/'.$ServiceList->image).'"/>';
        })
        ->addColumn('action', function ($ServiceList) {
                return '<a href="'.route('editservice', $ServiceList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleteservice', $ServiceList->id).'" class="btn btn-danger delete_confirm"> Delete</a>
            ';
        })->rawColumns(['name_link','category_link','image', 'action'])
        ->make(true);
    }
}
