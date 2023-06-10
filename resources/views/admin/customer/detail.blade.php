@extends('admin.master')

@section('title')
    Customer detail page
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Customer Detail Information</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap">
                                        <tr>
                                            <th>Customer No</th>
                                            <td>{{$customer->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Customer Name</th>
                                            <td>{{$customer->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email Address</th>
                                            <td>{{$customer->email}}</td>
                                        </tr>

                                        <tr>
                                            <th>Mobile</th>
                                            <td>{{$customer->mobile}}</td>
                                        </tr>

                                        <tr>
                                            <th>NID</th>
                                            <td>{{$customer->nid}}</td>
                                        </tr>

                                        <tr>
                                            <th>Address</th>
                                            <td>{{$customer->address}}</td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <th>Image</th>--}}
{{--                                            <td>{{$customer->image}}</td>--}}
{{--                                        </tr>--}}
                                        <tr>
                                            <th>Date Of Birth</th>
                                            <td>{{$customer->date_of_birth}}</td>
                                        </tr>
                                        <tr>
                                            <th>Blood group</th>
                                            <td>{{$customer->Blood_group}}</td>
                                        </tr>


                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h4 class="card-title mb-4"> Order product information</h4>--}}
{{--                                    <table  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>SL NO</th>--}}
{{--                                            <th>Product Name</th>--}}
{{--                                            <th>Unit Price</th>--}}
{{--                                            <th>Quantity</th>--}}
{{--                                            <th>Total Price</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}


{{--                                        <tbody>--}}
{{--                                        @foreach($customers as $customer)--}}
{{--                                            <tr>--}}
{{--                                                <td>{{$loop->iteration}}</td>--}}
{{--                                                <td>{{$customer->product_name}}</td>--}}
{{--                                                <td>{{$customer->product_price}}</td>--}}
{{--                                                <td>{{$customer->product_qty}}</td>--}}
{{--                                                <td>{{$customer->product_price*$customer->product_qty}}</td>--}}

{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div> <!-- end col -->--}}
{{--                    </div> <!-- end row -->--}}
                </div>
            </div>
        </div>
    </div>
@endsection





