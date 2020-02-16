<?php

namespace App\Http\Controllers\config\paymentmethod;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Http\Requests\config\PaymentMethod\AddPaymentMethodRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddPaymentMethodAction extends BaseAdminController
{
    /**
     * instance of PaymentMethod model
     *
     * @var object
     */
    public $PaymentMethod;

    public function __construct(PaymentMethod $PaymentMethod){
    	parent::__construct();
    	$this->PaymentMethod = $PaymentMethod;
    }

    public function __invoke(AddPaymentMethodRequest $request)
    {
        $this->PaymentMethod->savePaymentMethod($request->all());
        return redirect(route('paymentmethod'))->with('result',['tabactive' => 'tab1','message' => 'The new Payment Method added successfully!']);
    }
}
