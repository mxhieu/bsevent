<?php

namespace App\Http\Controllers\config\department\itemgroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ItemGroup;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteItemGroup extends BaseAdminController
{
    private $ItemGroup;

    public function __construct(ItemGroup $ItemGroup)
    {
        parent::__construct();
        $this->ItemGroup = $ItemGroup;
    }

    /**
     * Soft delete company representatives
     *
     * @param   int  $id  id of company representatives
     *
     * @return  [type]       redirect to company view
     */
    public function __invoke($id)
    {
        $ItemGroupInfo = $this->ItemGroup->findOrFail($id);
        $ItemGroupInfo->is_deleted = 1;
        $ItemGroupInfo->save();
        return redirect(route('itemgroupview', $ItemGroupInfo->department_id))->with('result', ['tabactive' => 'tab1','message' => 'The ItemGroup deleted successfully!']);
    }
}
