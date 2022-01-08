@foreach($products as $product)
{{$product->name}}
<img src="{{url('/uploads/productImages'.'/'.$product->image)}}" alt="" style="width: 100px;height:100px">

<td><a href="{{route('products.edit',$product->id)}}"><button type="button" class="btn btn-primary">Update</button></a></td>
<td><a href="{{route('products.destroy',$product->id)}}"><button type="button" class="btn btn-primary">Delete</button></a></td>

@endforeach
