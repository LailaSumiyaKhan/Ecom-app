<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    //
    public function index()
    {
        return view('website.customer.index');
    }
    public function profie()
    {
        return view('website.customer.profile');
    }
    public function changePassword()
    {
        return view('website.customer.change-password');
    }
}
