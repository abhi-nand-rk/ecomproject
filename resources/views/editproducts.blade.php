@extends('layouts.app')
@section('content')
<!-- if there is a message show message -->
@if(!empty($message))
	<p>{{$message}}</p>
@endif
<!-- action attribute should have the route to submit form -->
    <form method="POST" action="{{url('products/'.$products->id.'/edit')}}">
	@csrf
        <label>Product Name : </label>
		<input type="text" name="productname" value={{$products->productname}}><br /><br />
        <label>Price : </label>
		<input type="number" name="price" value={{$products->price}}><br /><br />
        <label>Quantity : </label>
		<input type="number" name="quantity" value={{$products->quantity}}><br /><br />
        <label>Description : </label>
		<input type="text" name="description" value={{$products->description}}><br /><br />
		<input type="submit" value="Update">
	</form>
@endsection