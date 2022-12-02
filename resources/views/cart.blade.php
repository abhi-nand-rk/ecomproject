@extends('layouts.app')

@section('content')
<div class="container">
            <div class="row">  
                <div class="col-md-6"> 
                    <div class="card">
                        <div class="card-body">
                        Product
                        </div>
                    </div>

                </div>
                <div class="col-md-3"> 
                    <div class="card">
                        <div class="card-body">
                        Price
                        </div>
                    </div>
                </div>
                <div class="col-md-3"> 
                    <div class="card">
                        <div class="card-body">
                        Action
                        </div>
                    </div>
                </div>
            </div>
        @if(!empty($products))
            @foreach($products as $product)   
            <div class="row">  
                <div class="col-md-6"> 
                    <div class="card">
                        <div class="card-body">
                        {{$product->productname}}
                        </div>
                    </div>

                </div>
                <div class="col-md-3"> 
                    <div class="card">
                        <div class="card-body">
                        {{$product->price}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3"> 
                    <div class="card">
                        <div class="card-body">
                        <a href="" class="btn btn-danger">Remove from cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    
    
</div>
@endsection
