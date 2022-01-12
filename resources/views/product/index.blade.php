@extends('admin.sidebar')
@section('main-content')
 <!-- Begin Page Content -->
 <div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto">Products</h4>
            <a href="{{route('products.create')}}" class="btn btn-primary btn-circle .btn-sm float-right">
                <i class="fas fa-plus"></i>                </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->brand->name??'-'}}</td>
                            <td>
                                <img src="{{asset('/uploads/productImages'.'/'.$product->image)}}" alt="" style="width:100px;heigth:100pxs">
                            </td>
                            <td>
                                @if($product->status==0)
                                <span class="badge bg-danger">Disable</span>
                                @else
                                <span class="badge bg-primary">Enable</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary btn-circle">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{route('products.destroy',$product->id)}}" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach


                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection

