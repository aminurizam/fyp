@extends('login.test')

@section('content')

    {{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Register</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('matricNo') ? ' has-error' : '' }}">--}}
                            {{--<label for="matricNo" class="col-md-4 control-label">Matric Number</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="matricNo" type="text" class="form-control" name="matricNo" value="{{ old('matricNo') }}" required autofocus>--}}

                                {{--@if ($errors->has('matricNo'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('matricNo') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">Student E-Mail</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

                    <!-- Advanced login -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        <div class="panel panel-body login-form">
                            {{ csrf_field() }}

                            <div class="text-center">
                                <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                <h5 class="content-group">Registration <small class="display-block">All fields are required</small></h5>
                            </div>

                            <div class="content-divider text-muted form-group"><span>Your credentials</span></div>

                            <div class="form-group has-feedback has-feedback-left{{ $errors->has('matricNo') ? ' has-error' : '' }}">
                                <input id="matricNo" type="text" class="form-control" name="matricNo" value="{{ old('matricNo') }}" placeholder="Matric Number" required autofocus>

                                @if ($errors->has('matricNo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('matricNo') }}</strong>
                                </span>
                                @endif

                                <div class="form-control-feedback">
                                    <i class="icon-user-check text-muted"></i>
                                </div>
                                {{--<span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> This username is already taken</span>--}}
                            </div>

                            <div class="form-group has-feedback has-feedback-left{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Student E-mail" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="form-control-feedback">
                                    <i class="icon-mention text-muted"></i>
                                </div>
                            </div>


                            <div class="form-group has-feedback has-feedback-left{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                            </div>

                            <button type="submit" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
                        </div>
                    </form>
                    <!-- /advanced login -->


                    <!-- Footer -->
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
@endsection
