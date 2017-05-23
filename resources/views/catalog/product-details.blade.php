@extends('layouts.app')
@section('content')
    <div class="container">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    <hr>
        <div class="row">
            <div class="col-md-4">
            <a><img src="{{ $product->image }} " class="img-thumbnail"></a>
                <br><br>
            </div>

            <div class="col-md-8">
                <h1>{{ $product->name }}</h1>
                @if($product->price == !null)
                <p> Price: RM {{ $product->price}}</p>
                @endif
                @if($product->changeItem == !null)
                    <p>Change Item: {{ $product->changeItem }}</p>
                @endif
                <p>Category: {{ $product->category }}</p>
                <p> Transaction Type: {{ $product->transactionType }}</p>
                <p> Detail: {{ $product->detail }}</p>
                <br>
                @if(Auth::check())
                        <form action="{{ action('ProductController@addToCart', $product->id) }}">
                            {!! csrf_field() !!}
                            {{--Quantity:<input type="number" name="quantity" min="1" max="10" value="1" required><br><br>--}}
                            <button type="submit" class="btn btn-success pull-right">
                                @if($product->transactionType == 'Buy')
                                Add To Cart
                                @elseif($product->transactionType == 'Exchange')
                                Add to Exchange Cart
                                @else
                                Add to Free Cart
                                @endif
                            </button>
                            {{--<input type="hidden" name="sid" value="{{ $product->seller_id }}">--}}
                        </form>
                @endif
            </div>
            
        </div>
        <hr>
    </div>
@endsection