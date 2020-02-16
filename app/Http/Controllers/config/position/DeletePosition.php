<?php

namespace App\Http\Controllers\config\position;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeletePosition extends BaseAdminController
{
    private $Position;

    public function __construct(Position $Position)
    {
        parent::__construct();
        $this->Position = $Position;
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
        $PositionInfo = $this->Position->findOrFail($id);
        $PositionInfo->is_deleted = 1;
        $PositionInfo->save();
        return redirect(route('position'))->with('result', ['tabactive' => 'tab1','message' => 'The Position deleted successfully!']);
    }
}
