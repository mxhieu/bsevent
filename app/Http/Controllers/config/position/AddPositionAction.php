<?php

namespace App\Http\Controllers\config\position;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Http\Requests\config\position\AddPositionRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddPositionAction extends BaseAdminController
{
    /**
     * instance of Position model
     *
     * @var object
     */
    public $Position;

    public function __construct(Position $Position){
    	parent::__construct();
    	$this->Position = $Position;
    }

    public function __invoke(AddPositionRequest $request)
    {
        $this->Position->savePosition($request->all());
        return redirect(route('position'))->with('result',['tabactive' => 'tab1','message' => 'The new position added successfully!']);
    }
}
