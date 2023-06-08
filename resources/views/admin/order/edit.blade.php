@extends('admin.master')

@section('title')
    Order Edit page
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"> Order Edit information</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <form action="{{route('admin.order-update')}}" method="POST">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label  class="col-sm-3 col-form-label">Order Id</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly value="{{$order->id}}"  class="form-control" name="order_id" >
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label  class="col-sm-3 col-form-label">Order Total</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly value="{{$order->order_total}}" class="form-control" name="order_total" >
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label  class="col-sm-3 col-form-label">Customer Information</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="customer_info" readonly value="{{$order->customer->name.'(.'.$order->customer->mobile.')'}}" class="form-control"  >
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-sm-3 col-form-label">Delivery Address</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="delivery_address" >{{$order->delivery_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Order Status</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="order_status" required>
                                                    <option value="" disabled selected> --Select Order Status-- </option>
                                                    <option value="pending" {{$order->order_status == 'pending' ? 'selected' : ''}}> Pending</option>
                                                    <option value="Processing" {{$order->order_status == 'Processing' ? 'selected' : ''}}> Processing</option>
                                                    <option value="Complete" {{$order->order_status== 'Complete' ? 'selected' : ''}}> Complete</option>
                                                    <option value="Cancel" {{$order->order_status == 'Cancel' ? 'selected' : ''}}> Cancel</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-end">
                                            <div class="col-sm-9">

                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md">Update Order Information</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                   <!-- end row -->
                </div>
            </div>
        </div>
    </div>
@endsection





