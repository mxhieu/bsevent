<?php

namespace App\Http\Controllers\supplier\requestform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestForm;
use App\Http\Requests\supplier\requestform\EditRequestFormRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditRequestForm extends BaseAdminController
{
    /**
     * Instance of Supplier model
     *
     * @var [type]
     */
    private $RequestForm;

    public function __construct(RequestForm $RequestForm){
    	parent::__construct();
    	$this->RequestForm = $RequestForm;
    }

    public function __invoke($id, EditRequestFormRequest $request)
    {
        $RequestFormInfo = $this->RequestForm->findOrFail($id);
        $RequestFormInfo->fill($request->all());
        $RequestFormInfo->save();
        return redirect(route('requestform'))->with('result', ['tabactive' => 'tab1','message' => 'Cập nhật thành công yêu cầu!']);
    }
}
