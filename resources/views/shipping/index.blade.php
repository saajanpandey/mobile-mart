@inject('shipping','App\Models\Shipping')
@extends('admin.sidebar')
@section('main-content')
 <!-- Begin Page Content -->
 <div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto">Shipping Charges</h4>
            
            <a href="{{route('shipping.create')}}" class="btn btn-primary btn-circle .btn-sm float-right">
                <i class="fas fa-plus"></i>                </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($shippings as $shipping)
                        <tr>
                            <td>{{$shipping->name}}</td>
                            <td>{{$shipping->price}}</td>
                            <td>{{$shipping->remarks}}</td>
                            <td>
                                <a href="{{route('shipping.edit',$shipping->id)}}" class="btn btn-primary btn-circle">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{route('shipping.destroy',$shipping->id)}}" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach


                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $shippings->links() !!}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection

