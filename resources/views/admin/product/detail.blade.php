@extends('admin.master')



@section('body')
    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"> Product Detail Information</h4>
                    <p class ="text-center text-success">{{session('message')}}</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                       <tr>
                                           <th>Product Id</th>
                                           <td>{{$product->id}}</td>
                                       </tr>
                                        <tr>
                                           <th>Product Name</th>
                                           <td>{{$product->name}}</td>
                                       </tr>
                                        <tr>
                                           <th>Product Code</th>
                                           <td>{{$product->code}}</td>
                                       </tr>
                                        <tr>
                                            <th>Product Slug</th>
                                            <td>{{$product->slug}}</td>
                                        </tr>

                                        <tr>
                                           <th>Product Category</th>
                                           <td>12{{$product->category->name}}3</td>
                                       </tr>
                                        <tr>
                                           <th>Product Sub Category</th>
                                           <td>{{$product->subCategory->name}}</td>
                                       </tr>
                                        <tr>
                                            <th> Brand</th>
                                            <td>{{$product->brand->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Unit</th>
                                            <td>{{$product->unit->name}}</td>
                                        </tr>
                                        <tr>
                                            <th> Regular Price</th>
                                            <td>{{$product->regular_price}}</td>
                                        </tr>
                                        <tr>
                                            <th> Selling Price</th>
                                            <td>{{$product->selling_price}}</td>
                                        </tr>
                                        <tr>
                                            <th> Stock Amount</th>
                                            <td>{{$product->stock_amount}}</td>
                                        </tr>

                                        <tr>
                                            <th>Short Description</th>
                                            <td>{{$product->short_description}}</td>
                                        </tr>
                                        <tr>
                                            <th>Long Description</th>
                                            <td>{!!  $product->long_description  !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Feature Image</th>
                                            <td><img src="{{asset($product->image)}}" alt="" height="100" width="130" /></td>
                                        </tr>
                                        <tr>
                                            <th>Other Image</th>
                                            <td>
                                                @foreach($product->otherImages as $otherImage)
                                                <img src="{{asset($otherImage->image)}}" alt="" height="100" width="130" />
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Hit Count</th>
                                            <td>{{$product->hit_count}}</td>
                                        </tr>
                                        <tr>
                                            <th>Sales Count</th>
                                            <td>{{$product->sales_count}}</td>
                                        </tr>
                                        <tr>
                                            <th>Feature Status</th>
                                            <td>{{$product->featured_status	}}</td>
                                        </tr>
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




