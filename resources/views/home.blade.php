@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(!empty($products))
            @foreach($products as $product)     
                <div class="col-md-4"> 
                    <div class="card">
                        <div class="card-header">{{$product->productname}}  <a href="{{ url('productdetails/'.$product->id) }}">more</a></div>
                        <div class="card-body">
                            <p>Description: {{$product->description}}</p>
                            <p>Price: {{$product->price}}</p>
                            @if(!empty(session('cart')))
                                @if(array_search($product->id,session('cart'))!==false)
                                    <span class="text-success">Already in cart</span>
                                @else
                                <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-primary">Add to Cart</a>
                                @endif
                            @else
                            <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-primary">Add to Cart</a>
                            @endif
                            
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    
</div>
@endsection
