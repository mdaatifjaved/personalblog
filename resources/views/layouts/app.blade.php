<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
      .mainpage
      {
        padding-top: 30px;
        padding-right: 50px;
        padding-bottom: 20px;
        padding-left: 50px;
        text-align:center;
      }
    </style>
</head>
<body>
    <div id="app">
      <div class="navbar">

        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        PersonalBlog
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li> <a href="{{ url('/home') }}">Home</a> </li>
                        @if(Auth::id() == 4)
                        <li> <a href="{{ url('/post') }}">Add Post</a> </li>
                        @endif
                    </ul>
                    @if(Auth::guest())
                    <p class="navbar-text">Welcome To The Blog</p>
                    @else
                    <form class="navbar-form navbar-left" method="POST" action='{{ url("/search") }}'>
                      {{csrf_field()}}
                      <div class="form-group">
                      <input type="text" name="search" class="form-control" placeholder="Search">
                        <button type="submit" class="btn bt-default">GO!</button>
                      </div>
                    </form>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><span class="fas fa-sign-in-alt"></span> Login</a></li>
                            <li><a href="{{ route('register') }}"><span class="fas fa-user-plus"></span> Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  @if(Auth::id() == 4)
                                  <li> <a href="{{url('/profile')}}">Profile</a> </li>
                                  <li> <a href="{{url('/category')}}">Categories</a> </li>
                                  @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
