<?php

namespace App\Http\Controllers\config\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ItemList extends BaseAdminController
{
    public function __construct(Item $Item){
    	parent::__construct();
    	$this->Item = $Item;
    }

    public function __invoke()
    {
        $ItemList = $this->Item->getItemListByStatus(0);
        foreach($ItemList as $row)
        {
            $row->unit_name = $row->Unit->name;
        }
        return Datatables::of($ItemList)
        ->addColumn('name_link', function ($ItemList) {
            return '<a href="'.route('edititem', $ItemList->id).'">'.$ItemList->name.'</a>';
        })
        ->addColumn('category_link', function ($ItemList) {
            return '<a href="'.route('edititemcategory', $ItemList->ItemCategory->id).'">'.$ItemList->ItemCategory->name.'</a>';
        })
        ->addColumn('image', function ($ItemList) {
            return '<img class="data_image_list" src="'.url('/upload/item/'.$ItemList->image).'"/>';
        })
        ->addColumn('action', function ($ItemList) {
                return '<a href="'.route('edititem', $ItemList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleteitem', $ItemList->id).'" class="btn btn-danger delete_confirm"> Delete</a>
            ';
        })->rawColumns(['name_link','category_link','image', 'action'])
        ->make(true);
    }
}
