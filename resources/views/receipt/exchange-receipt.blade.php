@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    <h3 class="pull-left"><strong>Receipt</strong></h3>
                </div>
                <div class="col-md-8">
                    <br>
                    <button class="btn btn-primary pull-right">Print as PDF</button>
                </div>
            </div>
            <hr>
            @foreach($exchanges as $exchange)

            <div class="col-md-10 col-md-offset-1">
                Seller
                <p>{{ $exchange->seller->user->name }}</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 35%">Product Image</th>
                            <th style="width: 25%">Product Name</th>
                            <th>Product Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th><img src="{{ $exchange->product->image }}" alt=""></th>
                            <th>{{ $exchange->product->name }}</th>
                            <th>{{ $exchange->product->detail }}</th>
                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="col-md-10 col-md-offset-1">
                Buyer
                <p>{{ $exchange->user->name }}</p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 35%">Product Image</th>
                        <th style="width: 25%">Product Name</th>
                        <th>Product Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1</th>
                        <th><img src="{{ $exchange->image }}" alt="" style="max-height: 260px"></th>
                        <th>{{ $exchange->name }}</th>
                        <th>{{ $exchange->details }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>

            @endforeach
        </div>
    </div>
@endsection