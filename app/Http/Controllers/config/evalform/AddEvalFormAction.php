<?php

namespace App\Http\Controllers\config\evalform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EvalForm;
use App\Http\Requests\config\EvalForm\AddEvalFormRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddEvalFormAction extends BaseAdminController
{
    /**
     * instance of EvalForm model
     *
     * @var object
     */
    public $EvalForm;

    public function __construct(EvalForm $EvalForm){
    	parent::__construct();
    	$this->EvalForm = $EvalForm;
    }

    public function __invoke(AddEvalFormRequest $request)
    {
        $this->EvalForm->saveEvalForm($request->all());
        return redirect(route('evalform'))->with('result',['tabactive' => 'tab1','message' => 'The new evalform added successfully!']);
    }
}
