@extends('website.master')

@section('title')
   My Profile
@endsection

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Customer Profile</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{'home'}}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Customer Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{route('customer-dashboard')}}">My Dashboard</a></li>
                            <li class="list-group-item"><a href="{{route('customer-profile')}}">My Profile</a></li>
                            <li class="list-group-item"><a href="{{route('customer-order')}}">My Order</a></li>
                            <li class="list-group-item"><a href="">My Account</a></li>
                            <li class="list-group-item"><a href="">Change Password</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9">
                   <div class="card card-body">
                    <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                  <form action="{{route('update-customer-profile')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row mb-3" >

                          <div class="col-3 mx-auto">
                              @if($customer->image)
                                  <img src="{{asset($customer->image)}}" alt="" height="200" width="300"/>
                              @else
                                  <img src="{{asset('/')}}downloads/avatar.svg" alt="" height="300" width="300"/>
                              @endif
                              <input type="file" class="form-control-file" name="image"/>

                          </div>
                      </div>

                      <div class="row mb-3" >
                          <label class="col-md-3">Full Name</label>
                          <div class="col-md-9">
                              <input type="text" value="{{$customer->name}}" name="name" class="form-control"/>
                          </div>
                      </div>
                      <div class="row mb-3" >
                          <label class="col-md-3">Email Address</label>
                          <div class="col-md-9">
                              <input type="text" value="{{$customer->email}}" name="email"  class="form-control"/>
                          </div>
                      </div>
                      <div class="row mb-3" >
                          <label class="col-md-3">Mobile Number</label>
                          <div class="col-md-9">
                              <input type="text"  value="{{$customer->mobile}}" name="mobile" class="form-control"/>
                          </div>
                      </div>
                      <div class="row mb-3" >
                          <label class="col-md-3">National ID</label>
                          <div class="col-md-9">
                              <input type="text"  value="{{$customer->nid}}" name="nid"  class="form-control"/>
                          </div>
                      </div>
                      <div class="row mb-3" >
                          <label class="col-md-3"> Mailing Address</label>
                          <div class="col-md-9">
                              <textarea  class="form-control" name="address">{{$customer->address}}</textarea>
                          </div>
                      </div>
                      <div class="row mb-3" >
                          <label class="col-md-3">Date Of Birth</label>
                          <div class="col-md-9">
                              <input type="date"  value="{{$customer->date_of_birth}}"   class="form-control" name="date_of_birth"/>
                          </div>
                      </div>
                      <div class="row mb-3" >
                          <label class="col-md-3">Blood Group</label>
                          <div class="col-md-9">
                              <input type="text" value="{{$customer->blood_group}}" class="form-control" name="blood_group"/>
                          </div>
                      </div>
                      <div class="row mb-3" >
                          <label class="col-md-3"></label>
                          <div class="col-md-9">
                              <input type="submit" class="btn btn-success" value="Upadate Information"/>
                          </div>
                      </div>
                  </form>
                   </div>
                </div>
            </div>
        </div>
    </div>



@endsection




