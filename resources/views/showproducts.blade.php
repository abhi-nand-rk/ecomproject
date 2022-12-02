@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    @if(!empty($message))
	<p>{{$message}}</p>
    @endif
    
    <h1>Product Entry Form</h1>
	<form method="POST" action="/products/create">
	@csrf
        <label>Product Name : </label>
		<input type="text" name="productname"><br /><br />
        <label>Quantity : </label>
		<input type="number" name="quantity"><br /><br />
        <label>Description: </label>
		<input type="text" name="description"><br /><br />
        <label>Price : </label>
		<input type="number" name="price"><br /><br />

		<input type="submit" value="Add" class="btn btn-primary">
	</form>
@endsection