@extends('admin.master')

@section('title')
    Manage Customer Page
@endsection

@section('body')
    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">All Category information</h4>
                    <p class ="text-center text-success">{{session('message')}}</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">



                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$customer->name}}</td>
                                                <td>{{$customer ->email}}</td>
                                                <td>{{$customer->mobile}}</td>
                                                <td>{{$customer->address}}</td>
                                                <td>
                                                    <a href="{{route('admin.customer-detail',['id'=>$customer->id])}}" class="btn btn-info btn-sm" title="customer detail"><i class="fa fa-book-open"></i></a>

                                                    <a href="{{route('admin.customer-delete',['id'=>$customer->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this..');"><i class="fa fa-trash"></i></a>
                                                </td>
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



