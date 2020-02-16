<?php

namespace App\Http\Controllers\config\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use Session;
use App\Http\Requests\config\Bank\EditBankRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditBank extends BaseAdminController
{
    /**
     * Instance of Bank model
     *
     * @var [type]
     */
    private $Bank;

    public function __construct(Bank $Bank){
    	parent::__construct();
    	$this->Bank = $Bank;
    }

    public function __invoke($id, EditBankRequest $request)
    {
        $BankInfo = $this->Bank->findOrFail($id);
        $data['BankInfo'] = $BankInfo;
        if($request->isMethod('post'))
        {
            $this->Bank->updateBank($BankInfo, $request->all());
            return redirect(route('bank'))->with('result',['tabactive' => 'tab1','message' => 'The Bank updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.bank.index', $data);
    }
}
