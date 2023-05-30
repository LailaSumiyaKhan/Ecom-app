@extends('website.master')

@section('title')
   Checkout Page
@endsection

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="">
                            <li>
                                <h6 class="title" >Order Checkout Information</h6>
                                <section class="checkout-steps-form-content " >
                                    <form action="{{'new-order'}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Full Name<span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            <input type="text" name="name" placeholder="First Name"/>
                                                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : " "}}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address<span class="text-danger">*</span></label>
                                                    <div class="form-input form">
                                                        <input type="text" name="email" placeholder="Email Address">
                                                        <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : " "}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number<span class="text-danger">*</span></label>
                                                    <div class="form-input form">
                                                        <input type="text" name="mobile" placeholder="Phone Number">
                                                        <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : " "}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address<span class="text-danger">*</span></label>
                                                    <div class="form-input form">
                                                        <textarea name="delivery_address" placeholder="Order Delivery Address"></textarea>
                                                        <span class="text-danger">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : " "}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Payment Type</label>
                                                    <div class="">
                                                        <label class="me-3"><input type="radio" name="payment_type" value="1" checked > Cash On Delivery</label>
                                                        <label><input type="radio" name="payment_type" value="2" > Online</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button  type="submit" class="btn">Confirm Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">

                        <div class="checkout-sidebar-price-table ">
                            <h5 class="title">Shopping Cart Summary</h5>
                            <div class="sub-total-price">
                                @php($sum = 0)
                                @foreach($cart_products as $cart_product)
                                <div class="total-price">
                                    <p class="value">{{$cart_product->name}} - ({{$cart_product->price}} * {{$cart_product->qty}})</p>
                                    <p class="price">{{$cart_product->price * $cart_product->qty}}</p>
                                </div>
                                    @php($sum = $sum + ($cart_product->price * $cart_product->qty))
                                @endforeach
                                <hr/>
                                <div class="total-price">
                                    <p class="value">Tax Amount</p>
                                    @php($tax = round($sum*0.15))
                                    <p class="price">{{$tax}}</p>
                                </div>
                                <div class="total-price">
                                    <p class="value">Shipping Cost</p>
                                    @php($shipping = 500)
                                    <p class="price">{{$shipping}}</p>
                                </div>

                                    @if(Session::get('cupon_amount'))
                                        <div class="total-price">
                                            <p class="value">Discount Amount</p>
                                            <p class="price">{{Session::get('cupon_amount')}}</p>
                                        </div>
                                        @php($sum = $sum + $tax + $shipping - Session::get('cupon_amount') )
                                @else
                                    @php($sum = $sum + $tax + $shipping  )
                                    @endif

                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total Payable</p>
                                    <p class="price">{{number_format($sum)}}</p>
                                    <?php
                                    Session::put('order_total',$sum);
                                    Session::put('tax_amount',$tax);
                                    Session::put('shipping_amount',$shipping);
                                    if (Session::get('cupon_amount'))
                                        {
                                            Session::put('shipping_amount',Session::get('cupon_amount'));
                                            Session::put('shipping_name',Session::get('cupon_name'));

                                        }
                                    ?>
                                </div>
                            </div>

                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('/')}}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

