@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Profile info -->
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
                                    <p class="form-control">{{ $profile->email }}</p>
                                </div>

                                <div class="col-md-6">
                                    <label>Matric number</label>
                                    <p class="form-control">{{ $profile->matricNo }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <p class="form-control">{{ $profile->name }}</p>
                                </div>
                                {{--<div class="col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" value="{{ $profile->id }}" class="form-control">
                                </div>--}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="contact">Contact Number</label>
                                    <p class="form-control">{{ $profile->phoneNo }}</p>
                                </div>

                                <div class="col-md-6">
                                    <label for="faculty">Faculty</label>
                                    <p class="form-control">{{ $profile->faculty }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="address">Address</label>
                                    <p class="form-control">{{ $profile->address }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if($profile->id == Auth::user()->id)
                        <div class="text-right">
                            <a href="{{ action('BuyerController@edit', $profile->id) }}">
                                <button type="submit" class="btn btn-primary">Edit<i class="icon-arrow-right14 position-right"></i></button>
                            </a>

                        </div>
                    @endif


            </div>
        </div>
        <!-- /profile info -->
    </div>
@endsection