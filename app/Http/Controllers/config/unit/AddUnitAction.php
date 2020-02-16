<?php

namespace App\Http\Controllers\config\unit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Http\Requests\config\Unit\AddUnitRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddUnitAction extends BaseAdminController
{
    /**
     * instance of Unit model
     *
     * @var object
     */
    public $Unit;

    public function __construct(Unit $Unit){
    	parent::__construct();
    	$this->Unit = $Unit;
    }

    public function __invoke(AddUnitRequest $request)
    {
        $this->Unit->saveUnit($request->all());
        return redirect(route('unit'))->with('result',['tabactive' => 'tab1','message' => 'The new Unit added successfully!']);
    }
}
