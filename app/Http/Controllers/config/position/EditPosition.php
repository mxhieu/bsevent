<?php

namespace App\Http\Controllers\config\position;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Position;
use Session;
use App\Http\Requests\config\Position\EditPositionRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditPosition extends BaseAdminController
{
    /**
     * Instance of Position model
     *
     * @var [type]
     */
    private $Position;

    public function __construct(Position $Position){
    	parent::__construct();
    	$this->Position = $Position;
    }

    public function __invoke($id, EditPositionRequest $request)
    {
        $PositionInfo = $this->Position->findOrFail($id);
        $data['PositionInfo'] = $PositionInfo;
        if($request->isMethod('post'))
        {
            $this->Position->updatePosition($PositionInfo, $request->all());
            return redirect(route('position'))->with('result',['tabactive' => 'tab1','message' => 'The position updated successfully!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.Position.index', $data);
    }
}
