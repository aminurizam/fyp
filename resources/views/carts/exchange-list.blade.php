@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-flat">
                <div class="panel-heading col-md-12">
                    <h3 class="pull-left"><strong>Exchange Cart</strong></h3>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><h4>No.</h4></th>
                                <th><h4>Product Image</h4></th>
                                <th><h4>Product Name</h4></th>
                                <th><h4>Action</h4></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($exchanges as $exchange)
                            <tr>
                                <th>{{$exchange->id}}</th>
                                <th><img src="{{ $exchange->product->image }}" alt="" style="max-height: 150px"></th>
                                <th>{{ $exchange->product->name }}</th>
                                {{--<th><img src="{{$prod->image}}" alt="" style="max-height: 150px"></th>--}}
                                {{--<th>{{ $prod->name }}</th>--}}
                                <th><a href="{{ action('ProductController@viewExchangeDetail', $exchange->id) }}" class="btn btn-primary">View</a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection