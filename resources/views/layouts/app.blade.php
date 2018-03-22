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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    @yield('styles')
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5YfIja81uQszysDa23wagev1BSdgh6Lq";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="row">

                @auth

                    <div class="col-lg-4">

                        <div class="card card-default">
                            <div class="card-header">Menu</div>

                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{ route('index') }}">Website</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('home') }}">Admin</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('profile.index')}}">User Profile</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('baptismal.index')}}">Baptismal</a>
                                    </li>

                                    @if(Auth::user()->admin == 1)
                                        <li class="list-group-item">
                                            <a href="{{ route('dedication.index')}}">Child Dedication</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('funeral.index')}}">Funeral Service</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('post.index') }}">Post List</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('category.index') }}">Category List</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('tag.index') }}">Tag List</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('user.index') }}">User List</a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->admin == 2)
                                        <li class="list-group-item">
                                            <a href="{{ route('dedication.index')}}">Child Dedication</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('funeral.index')}}">Funeral Service</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('post.index') }}">Post List</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->admin == 3)
                                        <li class="list-group-item">
                                            <a href="{{ route('dedication.index')}}">Child Dedication</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('funeral.index')}}">Funeral Service</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('post.index') }}">Post List</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->admin == 4)
                                        <li class="list-group-item">
                                            <a href="{{ route('dedication.index')}}">Child Dedication</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('funeral.index')}}">Funeral Service</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('post.index') }}">Post List</a>
                                        </li>
                                    @endif

                                </ul>
                            </div>

                        </div>
                </div>
                <div class="col-lg-8">@yield('content')</div>
                @else
                    <div class="col-lg-12">@yield('content')</div>
                @endauth

            </div>
        </div>

    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}")
    @endif

</script>
@yield('scripts')
</body>
</html>
