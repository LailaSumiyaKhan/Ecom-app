@extends('admin.master')

@section('title')
   Order detail page
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"> Order Basic information</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap">
                                    <tr>
                                        <th>Order No</th>
                                        <td>{{$order->id}}</td>
                                    </tr>
                                        <tr>
                                            <th>Order Date</th>
                                            <td>{{$order->order_date}}</td>
                                        </tr>
                                        <tr>
                                            <th>Order Status</th>
                                            <td>{{$order->order_status}}</td>
                                        </tr>

                                        <tr>
                                            <th>Customer Info</th>
                                            <td>{{$order->customer->name.'(.'.$order->customer->mobile.')'}}</td>
                                        </tr>

                                        <tr>
                                            <th>Order Total</th>
                                            <td>{{$order->order_total}}</td>
                                        </tr>

                                        <tr>
                                            <th>Tax Amount</th>
                                            <td>{{$order->tax_amount}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Cost</th>
                                            <td>{{$order->shipping_amount}}</td>
                                        </tr>
                                        <tr>
                                            <th>Cupon Name</th>
                                            <td>{{$order->cupon_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount Amount</th>
                                            <td>{{$order->discount_amount}}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Type</th>
                                            <td>{{$order->payment_type == 1 ? 'cash': 'online'}}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Status</th>
                                            <td>{{$order->payment_status}}</td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Address</th>
                                            <td>{{$order->delivery_address}}</td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Status</th>
                                            <td>{{$order->delivery_status}}</td>
                                        </tr>
                                        <tr>
                                            <th>Currency</th>
                                            <td>{{$order->currency}}</td>
                                        </tr>

                                        <tr>
                                            <th>Transaction Id</th>
                                            <td>{{$order->transaction_id}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4"> Order product information</h4>
                                    <table  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>Product Name</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($order->orderDetails as $orderDetail)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$orderDetail->product_name}}</td>
                                                <td>{{$orderDetail->product_price}}</td>
                                                <td>{{$orderDetail->product_qty}}</td>
                                                <td>{{$orderDetail->product_price*$orderDetail->product_qty}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>
        </div>
    </div>
@endsection




