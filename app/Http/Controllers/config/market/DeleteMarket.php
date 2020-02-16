<?php

namespace App\Http\Controllers\config\market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class DeleteMarket extends BaseAdminController
{
    private $Market;

    public function __construct(Market $Market)
    {
        parent::__construct();
        $this->Market = $Market;
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
        $MarketInfo = $this->Market->findOrFail($id);
        $MarketInfo->is_deleted = 1;
        $MarketInfo->save();
        return redirect(route('market'))->with('result', ['tabactive' => 'tab1','message' => 'Xóa thành công thị trường!']);
    }
}
