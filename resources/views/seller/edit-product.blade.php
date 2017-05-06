@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h3><strong>Edit Product</strong></h3>
            <hr>
            @foreach($product as $prod)
                <form action="{{ action('ProductController@updateProduct', $prod->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('PATCH')}}
                    <div class="col-md-12">

                        <div class="col-md-4">
                            <img src="{{ $prod->image }}" alt="" style="max-width: 350px;">
                        </div>

                        <div class="col-md-8 form-group">

                            <div class="col-md-8">
                                <div class="col-md-3">
                                    <label for="">Product Name</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="name" id="edit-product" class="form-control" value="{{ $prod->name }}" style="width: 280%"><br>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="col-md-3">
                                    <label for="">Transaction Type</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="transactionType" id="edit-product" readonly class="form-control" value="{{ $prod->transactionType }}" style="width: 280%">
                                    <br>
                                </div>
                            </div>

                            @if($prod->transactionType == 'free' || $prod->transactionType == 'buy')
                            <div class="col-md-8">
                                <div class="col-md-3">
                                    <label for="">Price</label>
                                </div>
                                @if($prod->transactionType == 'free')
                                    <div class="col-md-5">
                                        <input type="text" name="price" class="form-control" readonly value="{{ $prod->price }}" style="width: 280%"><br>
                                    </div>
                                    @else
                                    <div class="col-md-5">
                                        <input type="text" name="price" class="form-control" value="{{ $prod->price }}" style="width: 280%"><br>
                                    </div>
                                @endif
                            </div>
                            @else
                            <div class="col-md-8">
                                <div class="col-md-3">
                                    <label for="">Exchange Item</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="changeItem" class="form-control" value="{{ $prod->changeItem }}" style="width: 280%"><br>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-8">
                                <div class="col-md-3">
                                    <label for="">Category</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="category" class="form-control" value="{{ $prod->category }}" style="width: 280%"><br>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="col-md-3">
                                    <label for="">Details</label>
                                </div>
                                <div class="col-md-5">
                                    {{--<input type="text" name="detail" class="form-control" value="{{ $prod->detail}}" style="width: 250%"><br>--}}
                                    <textarea name="detail" id="" cols="30" rows="5" class="form-control" style="width: 280%">{{ $prod->detail }}</textarea><br><br>
                                </div>
                            </div>

                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-success pull-right">Confirm</button>
                            </div>

                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection