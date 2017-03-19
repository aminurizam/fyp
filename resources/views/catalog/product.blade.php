@extends('layout')
@include('layouts.header')

@section('content')
    @foreach($products as $product)
        <div class="col-md-4" id="catalog">
            <a><img src="{{ asset('products/'.$product->id.'.jpg') }} " class="img-thumbnail"></a>
            <h5><strong>{{ $product->name }}</strong></h5>
            <p> RM {{ $product->price }}</p>
            <p> Category {{ $product->category }}</p>
            <p> Transaction Type: {{ $product->transactionType }}</p>
            <a href="{{ url('product', $product->id) }}" class="btn btn-primary">View product details</a>
            <br><br>
        </div>
    @endforeach

    {{--<nav class="numbering animated wow slideInRight" data-wow-delay=".5s">--}}
        {{--<ul class="pagination paging">--}}
            {{--<li>--}}
                {{-- display pagination --}}
                {{--{!! $products->render() !!}--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</nav>--}}

    
@endsection

@section('paginate')
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm">
            <li>
            {!! $products->links() !!}
            </li>
        </ul>
    </nav>
@endsection