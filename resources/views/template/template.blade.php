<!DOCTYPE html>
<html>
<head>
    @include('template.partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
      <span class="logo-mini"><b>Wecakep</b></span>
      <span class="logo-lg"><b>WECAKEP</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('img/user.jpeg')}}" class="user-image" alt="User Image">
                <span class="hidden-xs">
                @if (Auth::check())
                    {{Auth::user()->name}}
                @endif
                </span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    <img src="{{asset('img/user.jpeg')}}" class="img-circle" alt="User Image">

                    <p>
                        @if (Auth::check())
                            {{Auth::user()->name}}
                            <small>{{Auth::user()->level}}</small>
                        @endif
                    </p>
                </li>

                <li class="user-footer">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Keluar</button>
                    </form>
                </li>
            </ul>
        </li>
        </ul>
    </div>
    </nav>
</header>


<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
            <img src="{{asset('img/user.jpeg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p>
                @if (Auth::check())
                    {{Auth::user()->name}}
                @endif
            </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

            @include('template.partials.sidebar')
    </section>
</aside>

    <div class="content-wrapper">
        <section class="content-header">
        <h1>
            @yield('title')
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>

    @include('template.partials.footer')
    @include('template.partials.scripts')
</body>
</html>
