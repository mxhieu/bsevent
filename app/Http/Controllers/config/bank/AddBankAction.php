<?php

namespace App\Http\Controllers\config\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Http\Requests\config\Bank\AddBankRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddBankAction extends BaseAdminController
{
    /**
     * instance of Bank model
     *
     * @var object
     */
    public $Bank;

    public function __construct(Bank $Bank){
    	parent::__construct();
    	$this->Bank = $Bank;
    }

    public function __invoke(AddBankRequest $request)
    {
        $this->Bank->saveBank($request->all());
        return redirect(route('bank'))->with('result',['tabactive' => 'tab1','message' => 'The new Bank added successfully!']);
    }
}
