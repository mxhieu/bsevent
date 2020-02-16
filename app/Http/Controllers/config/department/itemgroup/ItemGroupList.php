<?php

namespace App\Http\Controllers\config\department\itemgroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\ItemGroup;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ItemGroupList extends BaseAdminController
{
    public function __construct(ItemGroup $ItemGroup){
        $this->ItemGroup = $ItemGroup;
    }

    public function __invoke( Request $request )
    {
        $departmentId = !empty(request('departmentId'))?request('departmentId'):null;
        $ItemGroupList = $this->ItemGroup->getItemGroup($departmentId);
        $ItemGroupList->load(['DetailItemGroup' => function ($query) {
            $query->where('is_deleted', '=', 0);
        }]);
        foreach($ItemGroupList as $row)
        {
            $row->qtyItem = count($row->DetailItemGroup);
        }
        return Datatables::of($ItemGroupList)
        ->addColumn('action', function ($ItemGroupList) {
                return '<a class="btn btn-success" style="color: white" href="'.route('detailitemgroupcategoryview', $ItemGroupList->id).'">Hạng mục</a>
                <a href="'.route('edititemgroup', $ItemGroupList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deleteitemgroup', $ItemGroupList->id).'" class="btn btn-danger delete_confirm"> Delete</a>';
        })
        ->make(true);
    }
}
