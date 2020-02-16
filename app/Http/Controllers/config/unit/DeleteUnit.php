<?php

namespace App\Http\Controllers\config\unit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteUnit extends BaseAdminController
{
    private $Unit;

    public function __construct(Unit $Unit)
    {
        parent::__construct();
        $this->Unit = $Unit;
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
        $UnitInfo = $this->Unit->findOrFail($id);
        $UnitInfo->is_deleted = 1;
        $UnitInfo->save();
        return redirect(route('unit'))->with('result', ['tabactive' => 'tab1','message' => 'The Unit deleted successfully!']);
    }
}
