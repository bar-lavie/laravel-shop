<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class CmsController extends MainController {

    function __construct() {
        parent::__construct();
        $this->middleware('adminverify');
    }

    public function dashboard() {
        self::$data['orders'] = Order::getOrders();
        return view('cms.dashboard', self::$data);
    }

}
