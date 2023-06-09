@extends('admin.master')

@section('title')
   Invoice page
@endsection

@section('body')
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-box">
                        <table>
                            <tr class="top">
                                <td colspan="5">
                                    <table>
                                        <tr>
                                            <td class="title">
                                                <img src="{{asset('/')}}website/assets/images/logo/logo.svg" alt="Company logo" style="width: 100%; max-width: 300px" />
                                            </td>

                                            <td>
                                                Invoice #: 0000{{$order->id}}<br />
                                               Order Date: {{$order->order_date}}<br />
                                                Delivery Date: {{date('Y-m-d')}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr class="information">
                                <td colspan="5">
                                    <table>
                                        <tr>
                                            <td>
                                                <h4>Delivery Information</h4>
                                               {{$order->customer->name}}<br />
                                                {{$order->customer->email}}<br />
                                                {{$order->customer->mobile}}<br />
                                                {{$order->delivery_address}}

                                            </td>

                                            <td>
                                                <h4>ShopGrid Limited</h4>
                                                Acme Corp.<br />
                                                John Doe<br />
                                                john@example.com
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr class="heading">
                                <td>Payment Method</td>

                                <td colspan="4">Check #</td>
                            </tr>

                            <tr class="details">
                                <td>{{$order->payment_type == 1 ? "Cash" : "Online"}}</td>

                                <td colspan="4">{{$order->payment_type == 1 ? "Cash On Delivery" : " Payment Gateway"}}</td>
                            </tr>

                            <tr class="heading">
                                <td>SL NO</td>
                                <td style="text-align: center">Item</td>
                                <td style="text-align: center">Unit Price</td>
                                <td  style="text-align: center">Quantity</td>
                                <td style="text-align: right">Total Price</td>
                            </tr>
                            @php($sum=0)
                                @foreach($order->orderDetails as $orderDetail)
                            <tr class="item">
                                <td>{{$loop->iteration}}</td>
                                <td style="text-align: center">{{$orderDetail->product_name}}</td>
                                <td style="text-align: center">{{$orderDetail->product_price}}</td>
                                <td style="text-align: center">{{$orderDetail->product_qty}}</td>
                                <td  style="text-align: right">{{$total = $orderDetail->product_price * $orderDetail->product_qty }}</td>
                            </tr>
                                    @php($sum = $sum + $total)
                            @endforeach

                            <tr class="total">
                                <td colspan="4"></td>
                                <td colspan="4">Sub Total: {{number_format($sum)}}</td>

                            <tr class="total">
                                <td colspan="4"></td>
                                @php($tax = round($sum*0.15))
                                <td colspan="4">Tax (15%) : {{$tax}}</td>
                            </tr>
                            <tr class="total">
                                <td colspan="4"></td>
                                @php($shipping = 500)
                                <td colspan="4">Shipping Cost :{{ $shipping}}</td>
                            </tr>
                            @if($order->discount_amount > 0)
                            <tr class="total">
                                <td colspan="4"></td>
                                <td colspan="4">Discount Amount : {{$order->discount_amount}}</td>
                                @php($totalPayable = ($sum + $tax + $shipping) - $order->discount_amount)
                            </tr>
                                @else
                                @php($totalPayable = $sum + $tax + $shipping  )

                                    @endif
                            <tr class="total">
                                <td colspan="4"></td>
                                <td colspan="4">Total Payable : {{number_format($totalPayable)}}</td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



