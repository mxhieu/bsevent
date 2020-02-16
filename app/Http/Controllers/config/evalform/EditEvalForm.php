<?php

namespace App\Http\Controllers\config\evalform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EvalForm;
use Session;
use App\Http\Requests\config\EvalForm\EditEvalFormRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditEvalForm extends BaseAdminController
{
    /**
     * Instance of EvalForm model
     *
     * @var [type]
     */
    private $EvalForm;

    public function __construct(EvalForm $EvalForm){
    	parent::__construct();
    	$this->EvalForm = $EvalForm;
    }

    public function __invoke($id, EditEvalFormRequest $request)
    {
        $EvalFormInfo = $this->EvalForm->findOrFail($id);
        $data['EvalFormInfo'] = $EvalFormInfo;
        if($request->isMethod('post'))
        {
            $this->EvalForm->updateEvalForm($EvalFormInfo, $request->all());
            return redirect(route('evalform'))->with('result',['tabactive' => 'tab1','message' => 'The EvalForm updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.EvalForm.index', $data);
    }
}
