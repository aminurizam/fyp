@extends('layouts.app')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
    @if(Session::has('cart'))
        <div class="row">
            <div class="">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            {{--<span class="badge">{{ $product['qty'] }}</span>--}}
                            <strong>{{ $product ['item']['name'] }}</strong>
                            <span class="label label-success">RM {{ $product['price'] }}</span>
                            <span class="badge">{{ $product['qty'] }}</span>
                            {{--<form action="{{ action('ProductController@removeProduct', $product['item']['id']) }}">--}}
                                {{--{{csrf_field()}}--}}
                                {{--{{method_field('delete')}}--}}
                                {{--<button type="submit">Remove</button>--}}
                                {{--<i class="fa fa-times pull-right" aria-hidden="true"></i>--}}
                            {{--</form>--}}

                            {{--<div class="btn-group">
                                <button type="button" class="btn btn-primary btn-group-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href=""><Red></Red>uce by 1</a></li>
                                    <li><a href="">Reduce All</a></li>
                                </ul>
                            </div>--}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="pull-right">
                <strong>Total: RM {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="pull-right">
                <a href="{{ action('ProductController@getCheckout') }}" type="button" class="btn btn-success">Checkout <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>No Items in Cart</h2>
            </div>
        </div>
    @endif
        </div>
    </div>
@endsection
