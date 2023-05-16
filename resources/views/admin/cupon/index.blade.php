@extends('admin.master')



@section('body')
    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Cupon Form</h4>
                    <p class ="text-center text-success">{{session('message')}}</p>
                    <form action="{{route('cupon.create')}}" method="POST" >
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Cupon Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Discount Amount</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control-file" name="amount" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input12" class="col-sm-3 col-form-label">Minimum Parchase Amount </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control-file" name="minimum_parchase_amount" id="horizontal-firstname-input12">
                            </div>
                        </div>


                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Cupon</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


