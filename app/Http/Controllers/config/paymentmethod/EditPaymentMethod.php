<?php

namespace App\Http\Controllers\config\paymentmethod;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Session;
use App\Http\Requests\config\PaymentMethod\EditPaymentMethodRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditPaymentMethod extends BaseAdminController
{
    /**
     * Instance of PaymentMethod model
     *
     * @var [type]
     */
    private $PaymentMethod;

    public function __construct(PaymentMethod $PaymentMethod){
    	parent::__construct();
    	$this->PaymentMethod = $PaymentMethod;
    }

    public function __invoke($id, EditPaymentMethodRequest $request)
    {
        $PaymentMethodInfo = $this->PaymentMethod->findOrFail($id);
        $data['PaymentMethodInfo'] = $PaymentMethodInfo;
        if($request->isMethod('post'))
        {
            $this->PaymentMethod->updatePaymentMethod($PaymentMethodInfo, $request->all());
            return redirect(route('paymentmethod'))->with('result',['tabactive' => 'tab1','message' => 'The Payment Method updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.PaymentMethod.index', $data);
    }
}
