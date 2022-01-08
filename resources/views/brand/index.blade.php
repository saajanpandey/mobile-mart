@foreach($brands as $brand)
{{$brand->name}}

<td><a href="{{route('brands.edit',$brand->id)}}"><button type="button" class="btn btn-primary">Update</button></a></td>
<td><a href="{{route('brands.destroy',$brand->id)}}"><button type="button" class="btn btn-primary">Delete</button></a></td>

@endforeach
