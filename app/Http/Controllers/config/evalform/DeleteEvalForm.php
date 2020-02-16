<?php

namespace App\Http\Controllers\config\evalform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EvalForm;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteEvalForm extends BaseAdminController
{
    private $EvalForm;

    public function __construct(EvalForm $EvalForm)
    {
        parent::__construct();
        $this->EvalForm = $EvalForm;
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
        $EvalFormInfo = $this->EvalForm->findOrFail($id);
        $EvalFormInfo->is_deleted = 1;
        $EvalFormInfo->save();
        return redirect(route('evalform'))->with('result', ['tabactive' => 'tab1','message' => 'The EvalForm deleted successfully!']);
    }
}
