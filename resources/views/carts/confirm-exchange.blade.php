@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3><strong>Exchange Cart Detail</strong></h3>
            <hr>
            @foreach($exchanges as $exchange)
            <div class="col-md-12">
                <div class="clearfix">
                <div class="col-md-6">
                    <div class="thumbnail" style="text-align: center">
                        <img src="{{ $exchange->product->image }}" alt="">
                        <h1><strong>{{ $exchange->product->name }}</strong></h1>
                        @if($exchange->product->price == !null)
                            <p> Price: RM {{ $exchange->product->price}}</p>
                        @endif
                        @if($exchange->product->changeItem == !null)
                            <p>Change Item: {{ $exchange->product->changeItem }}</p>
                        @endif
                        <p> Category: {{ $exchange->product->category }}</p>
                        <p> Transaction Type: {{ $exchange->product->transactionType }}</p>
                        <p> Detail: {{ $exchange->product->detail }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="thumbnail">
                        <img src="{{ $exchange->image }}" alt="">
                        <p> Product Name: {{ $exchange->name }}</p>
                        <p> Details: {{ $exchange->details }} </p>
                    </div>
                </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="list-inline pull-right " style="display: inline-block">
                    <form action="{{ action('ProductController@deleteExchange', $exchange->id) }}" method="post">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger" >Reject Request</button>
                        <a href="{{ action('ProductController@confirmExchange', $exchange->product_id) }}" class="btn btn-success" >Accept Request</a>
                    </form>
                    {{--<button type="submit" class="btn btn-success">Confirm</button>--}}

                </div>
            </div>

            @endforeach
        </div>
    </div>
@endsection