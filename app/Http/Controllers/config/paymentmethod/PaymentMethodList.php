<?php

namespace App\Http\Controllers\config\paymentmethod;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class PaymentMethodList extends BaseAdminController
{
    public function __construct(PaymentMethod $PaymentMethod){
    	parent::__construct();
    	$this->PaymentMethod = $PaymentMethod;
    }

    public function __invoke()
    {
        $PaymentMethodList = $this->PaymentMethod->getPaymentMethodListByStatus(0);
        return Datatables::of($PaymentMethodList)
        ->addColumn('action', function ($PaymentMethodList) {
                return '<a href="'.route('editpaymentmethod', $PaymentMethodList->id).'" class="btn btn-warning">Edit</a>
                <a href="'.route('deletepaymentmethod', $PaymentMethodList->id).'" class="btn btn-danger delete_confirm"> Delete</a>
            ';
        })
        ->make(true);
    }
}
