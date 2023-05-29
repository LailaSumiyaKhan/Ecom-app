<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use ShoppingCart;
use Session;


class CheckoutController extends Controller
{
    //
    private $order,$orderDetail,$customer;
    public function index()
    {
        return view('website.checkout.index',['cart_products'=> ShoppingCart::all()]);
    }
    public function newOrder(Request $request)
    {
      $this->customer = new Customer();
      $this->customer->name = $request->name;
      $this->customer->email  = $request->email;
      $this->customer->password = bcrypt($request->mobile);
      $this->customer->mobile  = $request->mobile;
        $this->customer->save();

        $this->order = new Order();
        $this->order->customer_id = $this->customer->id;
        $this->order->order_total = Session::get('order_total');
        $this->order->tax_amount = Session::get('tax_amount');
        $this->order->shipping_amount =Session::get('shipping_amount');
        if (Session::get('cupon_amount'))
        {
            $this->order->discount_amount = Session::get('cupon_amount');
            $this->order->cupon_name = Session::get('cupon_name');
        }

        $this->order->order_date = date('y-m-d');
        $this->order->order_timestamp = strtotime(date('y-m-d'));
        $this->order->payment_type = $request->payment_type;
        $this->order->delivery_address = $request->delivery_address;
        $this->order->save();

        foreach (ShoppingCart::all() as $item)
        {
            $this->orderDetail = new OrderDetail();
            $this->orderDetail->order_id = $this->order->id;
            $this->orderDetail->product_id = $item->id;
            $this->orderDetail->product_name =$item->name;
            $this->orderDetail->product_price = $item->price;
            $this->orderDetail->product_qty =$item->qty;
            $this->orderDetail->save();

            ShoppingCart::remove($item->__raw_id);
        }
        return 'success';


    }

}
