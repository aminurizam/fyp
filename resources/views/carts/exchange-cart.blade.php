@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3><strong>Exchange Cart</strong></h3>
            <hr>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="thumbnail" style="text-align: center">
                        <img src="{{ $product->image }}" alt="">
                        <h1><strong>{{ $product->name }}</strong></h1>
                        @if($product->price == !null)
                            <p> Price: RM {{ $product->price}}</p>
                        @endif
                        @if($product->changeItem == !null)
                            <p>Change Item: {{ $product->changeItem }}</p>
                        @endif
                        <p>Category: {{ $product->category }}</p>
                        <p> Transaction Type: {{ $product->transactionType }}</p>
                        <p> Detail: {{ $product->detail }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="form-horizontal" action="{{ action('ProductController@storeExchange')}}" method="post" enctype="multipart/form-data">
                    <div class="thumbnail clearfix">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->seller_id }}" name="sid">
                        <img class="image-placeholder img-circle-profile" style="width: 200px; height: 450px"/><br><br>
                        <h4><strong>Name</strong></h4>
                        <input type="text" name="name" class="form-control" placeholder="Product name">
                        <h4><strong>Detail</strong></h4>
                        <textarea name="details" cols="30" rows="5" class="form-control" placeholder="Provide any related information for the product.." required></textarea><br>
                        <h4><strong>Upload Image</strong></h4>
                        <input type="file" name="image" id="fileUpload" required>
                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#fileUpload").change(function(){
                updatePlaceholder(this);
            });
// file upload
            function updatePlaceholder(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.image-placeholder').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        })
    </script>
@endsection