@extends('layout')
@section('content')
    <div class="container">
    <hr>
        <div class="row">
            
            <div class="col-md-4">
            
            <a><img src="{{ asset('products/'.$product->id.'.jpg') }} " class="img-thumbnail"></a>
                <br><br>

            </div>

            <div class="col-md-8">
                <h1>{{ $product->name }}</h1>
                <p> Price: RM {{ $product->price}}</p>
                <p>Category: {{ $product->category }}</p>
                <p> Transaction Type: {{ $product->transactionType }}</p>
                <p> Detail: {{ $product->detail }}</p>
                <br>
                
                <form action="{{ url('addToCart') }}" method="post">
                    {!! csrf_field() !!}
                    Quantity:<input type="number" name="quantity" min="1" max="10" value="1" required><br><br>
                    <button type="submit" class="btn btn-primary">Add To Cart</button>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                </form>
            </div>
            
        </div>
        <hr>
    </div>
@endsection