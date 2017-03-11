<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Advanced login -->
                <form action="index.html">
                    <div class="panel panel-body login-form">
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
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <input id="password" type="password" class="form-control" name="password" required>

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
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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