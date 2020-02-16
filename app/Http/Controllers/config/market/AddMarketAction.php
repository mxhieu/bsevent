<?php

namespace App\Http\Controllers\config\market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market;
use App\Http\Requests\config\market\AddMarketRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class AddMarketAction extends BaseAdminController
{
    /**
     * instance of Bank model
     *
     * @var object
     */
    public $Market;

    public function __construct(Market $Market){
    	parent::__construct();
    	$this->Market = $Market;
    }

    public function __invoke(AddMarketRequest $request)
    {
        $this->Market->create($request->all());
        return redirect(route('market'))->with('result',['tabactive' => 'tab1','message' => 'Thêm thành công thị trường!']);
    }
}
