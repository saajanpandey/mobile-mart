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
                                <a href="{{route('brands.destroy',$brand->id)}}" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach


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
