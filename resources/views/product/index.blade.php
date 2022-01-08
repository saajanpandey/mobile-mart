@foreach($products as $product)
{{$product->name}}

<td><a href="{{route('products.edit',$product->id)}}"><button type="button" class="btn btn-primary">Update</button></a></td>
<td><a href="{{route('products.destroy',$product->id)}}"><button type="button" class="btn btn-primary">Delete</button></a></td>

@endforeach
