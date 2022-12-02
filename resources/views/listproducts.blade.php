@extends('layouts.app')

@section('content')
@if(!empty($products))
<a href = "/products/create" class="btn btn-primary">ADD Products</a>
	<table  class="table table-bordered">
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		@foreach($products as $product)
			<tr>
				<td>{{$product->productname}}</td>
				<td>{{$product->price}}</td>
				<td> 
					@if($product->status==0)
						@if(Auth::user()->type==='Admin')
							<a href = "products/{{$product->id}}/approve" class="btn btn-primary">APPROVE</a>
						@else
							<span style="color:red;">Unapproved</span>
						@endif
					@else
						<span style="color:green;">Approved</span>
					@endif
				</td>
				<td>
					<a href = "products/{{$product->id}}/view" class="btn btn-primary">VIEW</a>
					<a href = "products/{{$product->id}}/edit" class="btn btn-primary">EDIT</a>
					<a href = "products/{{$product->id}}/delete" class="btn btn-primary">DELETE</a>
				</td>
            
			</tr>
        
		@endforeach
	</table>
    @endif
@endsection