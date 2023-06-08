<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //
    public function index()
    {
        return view('admin.order.index',['orders'=>Order::orderBy('id','desc')->get()]);
    }
    public function detail($id)
    {
        return view('admin.order.detail',['order'=>Order::find($id)]);
    }
    public function edit($id)
    {
        return view('admin.order.edit',['order'=>Order::find($id)]);
    }
    public function update(Request $request)
    {
        Order::updateOrderInfo($request);
        return redirect('/admin/manage-order')->with('message','Order status info update successfully.');
    }

    public function invoice($id)
    {
        return view('admin.order.invoice');
    }
    public function downloadInvoice($id)
    {
        return view('admin.order.download-invoice');
    }
    public function delete($id)
    {
      Order::deleteOrder($id);
        return redirect('/admin/manage-order')->with('message','Order status info delete successfully.');

    }



}