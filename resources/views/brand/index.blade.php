@extends('admin.sidebar')
@section('title')
    Brand List
@endsection
@section('main-content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto">Brands</h4>
                <a href="{{route('brands.create')}}" class="btn btn-primary btn-circle .btn-sm ">
                    <i class="fas fa-plus"></i>                </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->name}}</td>
                            <td>
                                <a href="{{route('brands.edit',$brand->id)}}" class="btn btn-primary btn-circle">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a  class="btn btn-danger btn-circle" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Are you sure you want to delete?</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="{{route('brands.destroy',$brand->id)}}">Delete</a>
                                </div>
                            </div>
                            </div>
                            </div>

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $brands->links() !!}
                </div>
            </div>
        </div>
    </div>

</div>

</div>

@endsection
