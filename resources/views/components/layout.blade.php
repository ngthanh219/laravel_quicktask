<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ trans('user.users_manager') }}</title>
    @include('modules.header')
</head>
<body class="hold-transition skin-blue sidebar-mini mystyle">
    <div class="wrapper">
        <header class="main-header">
            <a href="" class="logo">
                <span class="logo-mini">
                    <img src="{{ asset('assets/dist/img/logo1.png') }}" alt="">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/dist/img/logo.png') }}" alt="">
                </span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-language"></i>
                                <span class="label label-danger">2</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul class="menu">
                                        <li><a href="#">Vietnamese</a></li>
                                        <li><a href="#">English</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('assets/dist/img/iconUser.png') }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ session()->get('username') }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{ asset('assets/dist/img/iconUser.png') }}" class="img-circle" alt="User Image">
                                    <p>
                                        {{ session()->get('username') }}
                                        <small>22/11/1999</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">{{ trans('user.change_password') }}</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('log-out') }}" class="btn btn-default btn-flat">{{ trans('user.log_out') }}</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="{{ route('user.index') }}">
                            <i class="fa fa-user"></i>
                            <span>{{ trans('user.users_manager') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('image.index') }}">
                            <i class="fa fa-list-ul"></i>
                            <span>{{ trans('image.images_manager') }}</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        @yield('content')
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>
                    <span id="year"></span> ©
                    <span id="design_name">
                        <a href="#">Nguyễn Thành</a>
                    </span>
                </b>
            </div>
            <strong><a href="#">SUN *</a></strong>
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>
    @include('modules.footer')
</body>
</html>
