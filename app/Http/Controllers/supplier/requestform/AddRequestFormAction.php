<?php

namespace App\Http\Controllers\supplier\requestform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestForm;
use App\Http\Requests\supplier\requestform\AddRequestFormRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddRequestFormAction extends BaseAdminController
{
    /**
     * instance of RequestForm model
     *
     * @var object
     */
    public $RequestForm;

    public function __construct(RequestForm $RequestForm){
    	parent::__construct();
    	$this->RequestForm = $RequestForm;
    }

    public function __invoke(AddRequestFormRequest $request)
    {
        $this->RequestForm->create($request->all());
        return redirect(route('requestform'))->with('result', ['tabactive' => 'tab1','message' => 'Thêm thành công yêu cầu!']);
    }
}
