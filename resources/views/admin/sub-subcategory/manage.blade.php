@extends('admin.master')

@section('title')
    Add Category page
@endsection

@section('body')
    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">All Sub Subcategory information</h4>
                    <p class ="text-center text-success">{{session('message')}}</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">



                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>Category Name</th>
                                            <th>Sub Category Name</th>
                                            <th>Sub SubCategory Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($subsubCategories as $subsubCategory)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$subsubCategory->category->name}}</td>
                                                <td>{{$subsubCategory->subcategory->name}}</td>
                                                <td>{{$subsubCategory->name}}</td>
                                                <td>{{$subsubCategory->description}}</td>
                                                <td><img src="{{asset($subsubCategory->image) }}"  alt="" height="60" width="70"/></td>
                                                <td>{{$subsubCategory->status}}</td>
                                                <td>
                                                    <a href="{{route('sub-subcategory.edit',['id'=>$subsubCategory->id])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('sub-subcategory.delete',['id'=>$subsubCategory->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this..');"><i class="fa fa-trash"></i></a>
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




