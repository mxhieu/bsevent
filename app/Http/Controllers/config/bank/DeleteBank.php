<?php

namespace App\Http\Controllers\config\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteBank extends BaseAdminController
{
    private $Bank;

    public function __construct(Bank $Bank)
    {
        parent::__construct();
        $this->Bank = $Bank;
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
        $BankInfo = $this->Bank->findOrFail($id);
        $BankInfo->is_deleted = 1;
        $BankInfo->save();
        return redirect(route('bank'))->with('result', ['tabactive' => 'tab1','message' => 'The Bank deleted successfully!']);
    }
}
