@extends('admin.dashboard')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Product Details</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <p><a><img src="{{ $product->image }}" alt="" style="max-height: 350px"></a></p>
                        </div>
                        <div class="col-md-8">
                            <label for="">Product Name: {{ $product->name }}</label><br>
                            <label for="">Transaction Type: {{ $product->transactionType }}</label><br>
                            @if($product->transactionType == 'Buy' || $product->transactionType == 'Free')
                                <label> Price: RM {{ $product->price }}</label>
                            @endif
                            @if($product->changeItem == !null)
                                <label>Item to change: {{ $product->changeItem }}</label>
                            @endif
                            <br>
                            <label for="">Category: {{ $product->category }}</label><br>
                            <label for="">Details: {{ $product->detail}}</label><br>
                            <label for="">Status Item:{{ $product->statusItem }}</label><br>
                            <label for="">Created at: {{ $product->created_at }}</label><br>
                            <a href="{{ action('AdminController@rejectProduct', $product->id) }}" class="btn btn-danger">Reject</a>
                            <a href="{{ action('AdminController@acceptProduct', $product->id) }}" class="btn btn-success">Accept Request</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection