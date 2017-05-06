@extends('layouts.app')
{{-- @include('layouts.header') --}}

@section('content')
    <div class="container">
        @if(Session::has('success'))
        <div class="row">
            <div class="col-md-4">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
        @endif
        <div class="thumbnail pull-left">
            <h4><strong>Type of transaction</strong></h4>
            @foreach($transactionTypes as $type)
                <ul>
                    <li><a href="/?type={{ $type->transactionType }}">{{ $type->transactionType }}</a></li>
                </ul>
            @endforeach
        </div>
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            <div class="col-md-offset-2">
                @foreach($productChunk as $product)
                    <div class="col-md-4 text-center" id="catalog">
                        <div class="thumbnail">
                            <img src="{{ $product->image }}" alt="">
                            <h3><strong>{{ $product->name }}</strong></h3>
                            @if($product->price == !null)
                            <p> Price: RM {{ $product->price }}</p>
                            @endif
                            @if($product->changeItem == !null)
                            <p>Item to change: {{ $product->changeItem }}</p>
                            @endif
                            <p> Category {{ $product->category }}</p>
                            <p> Transaction Type: {{ $product->transactionType }}</p>
                            <a href="{{ url('/product', $product->id) }}" class="btn btn-primary">View product details</a>
                            <br><br>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
        <div class="pull-right">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm">
                    <li>
                    {!! $products->links() !!}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection