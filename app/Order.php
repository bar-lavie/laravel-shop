<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;
use DB;

class Order extends Model {

    static public function save_new() {
        $cartCollection = Cart::getContent();
        $order = new self();
        $order->user_id = Session::get('user_id');
        $order->data = serialize($cartCollection->toArray());
        $order->total = Cart::getTotal();
        $order->save();
        Session::flash('sm-info', 'ההזמנה שלך בוצעה ותטופל בהקדם');
        Cart::clear();
    }

    static public function getOrders() {
        $sql = "SELECT u.name, o.* FROM orders o "
                . "JOIN users u ON u.id = o.user_id "
                . "ORDER BY o.created_at DESC";

        return DB::select($sql);
    }

}
