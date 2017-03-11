<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/core.css" rel="stylesheet" type="text/css">
    <link href="/css/components.css" rel="stylesheet" type="text/css">
    <link href="/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="/js/core/app.js"></script>
    <script type="text/javascript" src="/js/pages/navbar_components.js"></script>
    <!-- /theme JS files -->

</head>
<body>
<div class="navbar navbar-inverse bg-info-700 navbar-component" style="position: relative; z-index: 19;">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="/images/logo_light.png" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-form-icons"><i class="icon-menu2"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-form-icons">
        <form class="navbar-form navbar-left">
            <div class="form-group has-feedback">
                <input type="search" class="form-control" placeholder="Search field">
                <div class="form-control-feedback">
                    <i class="icon-search4 text-muted text-size-base"></i>
                </div>
            </div>
        </form>

        <form class="navbar-form navbar-right">

            <div class="navbar-right">
                @if(Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @else
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/images/placeholder.jpg" alt="">
                            <span>Victoria</span>
                            <i class="caret"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                            <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                            <li><a href="#"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-danger pull-right">58</span></a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                            <li>
                                <a href="{{ route('logout') }}" ><i class="icon-switch2"></i>Logout</a>
                                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--</form>--}}
                            </li>

                        </ul>
                    </li>
                </ul>
                @endif
            </div>
        </form>
    </div>
</div>
@yield('navbar')
</body>