<?php

namespace App\Http\Controllers\config\market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market;
use Session;
use App\Http\Requests\config\market\EditMarketRequest;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class EditMarket extends BaseAdminController
{
    /**
     * Instance of Market model
     *
     * @var [type]
     */
    private $Market;

    public function __construct(Market $Market){
    	parent::__construct();
    	$this->Market = $Market;
    }

    public function __invoke($id, EditMarketRequest $request)
    {
        $MarketInfo = $this->Market->findOrFail($id);
        $data['MarketInfo'] = $MarketInfo;
        if($request->isMethod('post'))
        {
            $param = $request->all();
            $param['id'] = $MarketInfo->id;
            $MarketInfo->fill($param);
            $MarketInfo->save();
            return redirect(route('market'))->with('result',['tabactive' => 'tab1','message' => 'Cập nhật thành công loại nhà cung cấp!']);
        }
        if(!Session::has('result'))
        {
            Session::flash('result',['tabactive' => 'tab2']);
        }
        return view('config.Market.index', $data);
    }
}
