@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Order History</strong></h3>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <h4 style="text-align: center">Order Details</h4>
                @foreach($orders as $order)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="list-group">
                                @foreach($order->cart->items as $item)
                                    <li class="list-group-item">
                                        <span class="badge">{{ $item ['price'] }} MYR</span>
                                        {{ $item['item']['name'] }} | {{ $item['qty'] }} Units
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <strong class="pull-right">Total Price: RM{{ $order->cart->totalPrice }}</strong>
                            <p> {{ $order->created_at }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection