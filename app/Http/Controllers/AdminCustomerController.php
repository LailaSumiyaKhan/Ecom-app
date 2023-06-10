<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
        return view('admin.customer.index',['customers'=>Customer::orderBy('id','desc')->get()]);
    }
    public function delete($id)
    {
        Customer::deleteCustomer($id);
        return redirect('/admin/manage-customer')->with('message','Customer info delete successfully.');

    }
    public function detail($id)
    {
        return view('admin.customer.detail',['customer'=>Customer::find($id)],['customers'=>Customer::all()]);
    }

}
