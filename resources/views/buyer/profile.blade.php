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
                <form action="{{ action('BuyerController@update', $profile->id) }}" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <tbody>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="text" readonly="readonly" name="email" value="{{ $profile->email }}" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label>Matric number</label>
                                    <input type="text" readonly="readonly" name="matricNo" value="{{ $profile->matricNo }}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $profile->name }}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" value="Kopyov" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="contact">Contact Number</label>
                                    <input type="text" name="phoneNo" value="{{ $profile->phoneNo }}" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="faculty">Faculty</label>
                                    <input type="text" name="faculty" value="{{ $profile->faculty }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="" cols="20" rows="5" class="form-control">{{ $profile->addresss }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /profile info -->
    </div>
@endsection