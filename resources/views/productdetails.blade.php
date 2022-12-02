@extends('layouts.app')

@section('content')
@if(!empty($products))

	<table class="table table-bordered">
		<tr>
            
			<th>Product Name</th>
            <td>{{$products->productname}}</td></tr>
			<tr><th>Price</th>
            <td>{{$products->price}}</td></tr>
            <tr><th>Description</th>
            <td>{{$products->description}}</td>
		</tr>	
	</table>
    @if(!empty(session('cart')))
                                @if(array_search($products->id,session('cart'))!==false)
                                    <span class="text-success">Already in cart</span>
                                @else
                                <a href="{{ url('add-to-cart/'.$products->id) }}" class="btn btn-primary">Add to Cart</a>
                                @endif
                            @else
                            <a href="{{ url('add-to-cart/'.$products->id) }}" class="btn btn-primary">Add to Cart</a>
                            @endif
    @endif
@endsection

