@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        @foreach($exchanges as $exchange)

            <div class="col-md-10 col-md-offset-1">

                <h2 class="pull-left">Receipt Order #0000{{ $exchange->id }}</h2>
                <br>
                <a href="{{ action('ProductController@printExchange') }}" class="btn btn-primary pull-right">Print as PDF</a>
                <br>
                <hr>

                <p>Transaction Type: Exchange</p>
                <p>Date & Time Transaction: {{ $exchange->created_at }}</p>
                <br>
                <h3>Exchange Requester Details</h3>
                <p>Name: {{ $exchange->seller->user->name }}</p>
                <p>Contact Number: {{ $exchange->seller->user->buyer->phoneNo }}</p>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 30%">Product Name</th>
                        <th style="width: 20%">Wanted Item</th>
                        <th>Product Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $exchange->product->name }}</td>
                        <td>{{ $exchange->product->changeItem }}</td>
                        <td>{{ $exchange->product->detail }}</td>
                    </tr>
                    </tbody>
                </table>

            </div>

            <div class="col-md-10 col-md-offset-1">
                <h3>Exchange Acceptor Details</h3>
                <p>Name: {{ $exchange->user->name }}</p>
                <p>Contact Number: {{ $exchange->user->buyer->phoneNo }}</p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 25%">Product Name</th>
                        <th>Product Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $exchange->name }}</td>
                        <td>{{ $exchange->details }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        @endforeach
    </div>
</div>
@endsection