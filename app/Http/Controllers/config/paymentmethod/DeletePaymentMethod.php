<?php

namespace App\Http\Controllers\config\paymentmethod;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeletePaymentMethod extends BaseAdminController
{
    private $PaymentMethod;

    public function __construct(PaymentMethod $PaymentMethod)
    {
        parent::__construct();
        $this->PaymentMethod = $PaymentMethod;
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
        $PaymentMethodInfo = $this->PaymentMethod->findOrFail($id);
        $PaymentMethodInfo->is_deleted = 1;
        $PaymentMethodInfo->save();
        return redirect(route('paymentmethod'))->with('result', ['tabactive' => 'tab1','message' => 'The Payment Method deleted successfully!']);
    }
}
