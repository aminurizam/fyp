@extends('layouts.app')
{{-- @include('layouts.header') --}}

@section('content')
    <div class="container">
    @include('catalog.product-category')
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            <div class="col-md-offset-2">
                @foreach($productChunk as $product)
                    <div class="col-md-4 text-center" id="catalog">
                        <div class="thumbnail">
                            <img src="{{ asset('products/'.$product->id.'.jpg') }} " class="img-responsive">
                            <h3><strong>{{ $product->name }}</strong></h3>
                            <p> Price: RM {{ $product->price }}</p>
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