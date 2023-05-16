@extends('admin.master')



@section('body')
    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">All Unit information</h4>
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
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($units as $unit)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$unit->name}}</td>
                                            <td>{{$unit->code}}</td>
                                            <td>{{$unit->description}}</td>
                                            <td>{{$unit->status}}</td>
                                            <td>
                                                <a href="{{route('unit.edit',['id'=>$unit->id])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('unit.delete',['id'=>$unit->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this..');"><i class="fa fa-trash"></i></a>
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


