@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            {{--@foreach($freeCart as $free)--}}

                <div class="col-md-10 col-md-offset-1">

                    <h2 class="pull-left">Receipt Order #0000{{ $free->id }}</h2>
                    <br>
                    <a href="{{ action('ProductController@printFree', $free->product_id) }}" class="btn btn-primary pull-right">Print as PDF</a>
                    <br>
                    <hr>

                    <p>Transaction Type: Free</p>
                    <p>Date & Time Transaction: {{ $free->created_at }}</p>
                    <br>
                    <h3>Product Information</h3>
{{--                    <p>Name: {{ $free->product->user->name}}</p>--}}
{{--                    <p>Contact Number: {{ $free->seller->user->phoneNo }}</p>--}}

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 30%">Product Name</th>
                            <th>Product Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ $free->product->name }}</td>
                            <td>{{ $free->product->detail }}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            {{--@endforeach--}}
        </div>
    </div>
@endsection