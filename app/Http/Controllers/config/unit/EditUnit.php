<?php

namespace App\Http\Controllers\config\unit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Session;
use App\Http\Requests\config\Unit\EditUnitRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditUnit extends BaseAdminController
{
    /**
     * Instance of Unit model
     *
     * @var [type]
     */
    private $Unit;

    public function __construct(Unit $Unit){
    	parent::__construct();
    	$this->Unit = $Unit;
    }

    public function __invoke($id, EditUnitRequest $request)
    {
        $UnitInfo = $this->Unit->findOrFail($id);
        $data['UnitInfo'] = $UnitInfo;
        if($request->isMethod('post'))
        {
            $this->Unit->updateUnit($UnitInfo, $request->all());
            return redirect(route('unit'))->with('result',['tabactive' => 'tab1','message' => 'The Unit updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.Unit.index', $data);
    }
}
