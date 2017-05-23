@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <!-- Profile info -->
            <div class="col-md-12">
                <div class="col-md-2">
                    @foreach($profiles as $profile)
                        <h4 style="text-transform: capitalize">{{ $profile->userRole }} Account</h4>
                        <br>
                        <a href="{{ action('BuyerController@index') }}">Account Dashboard</a>
                        <a href="">Order History</a>

                        @if($profile->userRole == 'seller')
                            <br><br>
                            <h4>Product Section</h4>
                            <a href="{{ action('ProductController@productType') }}">Add Product to Catalog</a>
                            <a href="{{ action('ProductController@viewProductStatus') }}">Status Product</a>
                            {{--<a href=""></a>--}}
                        @endif
                        <br><br>
                        <h4>Carts Section</h4>
                        <a href="{{ action('ProductController@viewCart') }}">Sell and Buy Cart</a><br>
                        @if(Auth::user()->roleCheck('seller'))
                        <a href="{{ action('ProductController@viewExchange') }}">Exchange Cart</a><br>
                        @endif
                    @endforeach
                </div>

                <div class="col-md-10">
                    <div class="panel panel-flat">
                <div class="panel-heading">
                    <h3>Profile information</h3>

                </div>

                <div class="panel-body">

                        @foreach($profiles as $profile)

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <p class="form-control" readonly>{{ $profile->email }}</p>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Matric number</label>
                                        <p class="form-control" readonly>{{ $profile->matricNo }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <p class="form-control" readonly>{{ $profile->name }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="contact">Contact Number</label>
                                        <p class="form-control" readonly>{{ $profile->buyer->phoneNo }}</p>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="faculty">Faculty</label>
                                        <p class="form-control" readonly>{{ $profile->buyer->faculty }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="address">Address</label>
                                        <p><textarea name="address" id="" cols="20" rows="5" class="form-control" readonly>{{ $profile->buyer->address }}</textarea></p>
                                    </div>
                                </div>
                            </div>

                        @if($profile->id == Auth::user()->id)
                            @if(Auth::user()->roleCheck('buyer'))
                            {{--<div class="pull-left">--}}
                                {{--<a href="{{ action('BuyerController@beSeller', $profile->id)}}">--}}
                                    {{--<button type="submit" class="btn btn-primary">Be a seller</button>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                                <div class="pull-left">
                                    <a href="{{ action('BuyerController@terms', $profile->id)}}">
                                        <button type="submit" class="btn btn-primary">Be a seller</button>
                                    </a>
                                </div>
                            @endif
                            <div class="pull-right">
                                <a href="{{ action('BuyerController@edit', $profile->id) }}">
                                    <button type="submit" class="btn btn-primary">Edit<i class="icon-arrow-right14 position-right"></i></button>
                                </a>
                            </div>

                        @endif
                    @endforeach
                </div>
            </div>
                </div>

            </div>
        <!-- /profile info -->
        </div>
    </div>
@endsection