@extends('admin.master')

@section('title')
    Add product page
@endsection

@section('body')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">All Product information</h4>
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
                                            <th>Code</th>
                                            <th>Selling Price</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->code}}</td>
                                                <td>{{$product->selling_price}}</td>
                                                <td><img src="{{asset($product->image) }}" alt="" height="50" width="70" /></td>
                                                <td>{{$product->status==1 ? 'published' : 'unpublished'}}</td>
                                                <td class="d-flex">
                                                    <a href="{{route('product.detail',['id'=>$product->id])}}" class="btn btn-info btn-sm mr-1" title="View Detail"><i class="fa fa-book-open"></i></a>
                                                    <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-success btn-sm mr-1" title="Edit Product"><i class="fa fa-edit"></i></a>

                                                    <form action="{{route('product.delete',['id'=>$product->id])}}" method="post" onsubmit="return confirm('Are you sure to delete this?')">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>

                                                        </button>
                                                    </form>
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



