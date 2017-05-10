@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Profile info -->
            <div class="panel panel-flat">
                <div class="panel-heading col-md-12">
                    <div class="col-md-8">
                        <h3 class="pull-left"><strong>Product Status Information</strong></h3>
                    </div>
                    <br>
                    <div class="col-md-4">
                        <a href="{{ action('ProductController@productType') }}" class="btn btn-primary pull-right">Add Product</a>
                    </div>
                </div>

                <div class="panel-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <th><h4>No.</h4></th>
                            <th><h4>Product Image</h4></th>
                            <th><h4>Product Name</h4></th>
                            <th><h4>Transaction Type</h4></th>
                            <th><h4>Price</h4></th>
                            <th><h4>Exchange Item</h4></th>
                            <th><h4>Category</h4></th>
                            <th><h4>Status</h4></th>
                            <th><h4>Action</h4></th>
                        </tr>
                        </thead>
                        <tbody>
                        <input type="hidden" value="{{$i=1}}">
                        @foreach($status as $stat)
                            <tr>
                                <th>{{$i++}}</th>
                                <th><img src="{{ $stat->image }}" alt="" style="max-height: 150px"></th>
                                <th>{{ $stat->name }}</th>
                                <th>{{ $stat->transactionType }}</th>
                                <th>{{ $stat->price }}</th>
                                @if($stat->changeItem == !null)
                                    <th>{{ $stat->changeItem }}</th>
                                    @else
                                    <th>None</th>
                                @endif
                                <th>{{ $stat->category }}</th>
                                <th><h4>
                                    @if($stat->statusItem == 'accepted')
                                        <span class="label label-success">{{ $stat->statusItem }}</span>
                                    @elseif($stat->statusItem == 'pending')
                                        <span class="label label-warning">{{ $stat->statusItem }}</span>
                                    @else
                                        <span class="label label-danger">{{ $stat->statusItem }}</span>
                                    @endif
                                    </h4>
                                </th>
                                <th>
                                    <a href="{{ action('ProductController@editProduct', $stat->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ action('ProductController@deleteProduct' ,$stat->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /profile info -->
        </div>
    </div>
@endsection