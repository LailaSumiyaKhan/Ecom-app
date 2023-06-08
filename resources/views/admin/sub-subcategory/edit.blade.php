@extends('admin.master')

@section('title')
    Edit Sub SubCategory page
@endsection

@section('body')
    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Sub Subcategory Form</h4>
                    <p class ="text-center text-success">{{session('message')}}</p>
                    <form action="{{route('sub-subcategory.update',['id'=>$subsubCategory->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option value="" disabled selected>--Select Category Name-- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category-> id == $subsubCategory-> category_id ? 'selected' : ''}}>{{$category->name}}  </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Subcategory Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="subcategory_id">
                                    <option value="" disabled selected>--Select Subcategory Name-- </option>
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}" {{$subCategory-> id == $subsubCategory->subcategory_id ? 'selected' : ''}}>{{$subCategory->name}}  </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"> Sub Subcategory Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name"  value="{{$subsubCategory->name}}" class="form-control"   id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Sub Subcategory Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="horizontal-email-input">{{$subsubCategory->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label"> Sub Subcategory Image</label>
                            <div class="col-sm-9">
                                <input type="file"name="image" class="form-control-file" id="horizontal-password-input"/>
                                <img src="{{asset($subsubCategory->image)}}" alt="" height="100" width="130"/>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Sub Subcategory Info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



