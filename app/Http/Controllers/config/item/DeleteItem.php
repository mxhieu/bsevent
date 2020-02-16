<?php

namespace App\Http\Controllers\config\item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteItem extends BaseAdminController
{
    private $Item;

    public function __construct(Item $Item)
    {
        parent::__construct();
        $this->Item = $Item;
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
        $ItemInfo = $this->Item->findOrFail($id);
        $ItemInfo->is_deleted = 1;
        $ItemInfo->save();
        return redirect(route('item'))->with('result', ['tabactive' => 'tab1','message' => 'The Item deleted successfully!']);
    }
}
