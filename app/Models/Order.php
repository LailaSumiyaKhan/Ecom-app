<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Order extends Model
{
    use HasFactory;
    private static $order;
    public  static function newOrder($request,$customerId)
    {
        self::$order = new Order();
        self::$order->customer_id = $customerId;
        self::$order->order_total = Session::get('order_total');
        self::$order->tax_amount = Session::get('tax_amount');
        self::$order->shipping_amount =Session::get('shipping_amount');
        if (Session::get('cupon_amount'))
        {
            self::$order->discount_amount = Session::get('cupon_amount');
            self::$order->cupon_name = Session::get('cupon_name');
        }

        self::$order->order_date = date('y-m-d');
        self::$order->order_timestamp = strtotime(date('y-m-d'));
        self::$order->payment_type = $request->payment_type;
        self::$order->delivery_address = $request->delivery_address;
        self::$order->save();
        return self::$order;
    }

}
