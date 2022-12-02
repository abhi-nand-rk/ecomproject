@extends('layouts.app')

@section('content')
@if(!empty($products))

	<table class="table table-bordered">
		<tr>
            <th>ID</th>
			<th>Product Name</th>
			<th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
		</tr>
		
			<tr>
				<td>{{$products->id}}</td>
				<td>{{$products->productname}}</td>
                <td>{{$products->price}}</td>
                <td>{{$products->quantity}}</td>
                <td>{{$products->description}}</td>
			</tr>
        
		
	</table>
    @endif
@endsection