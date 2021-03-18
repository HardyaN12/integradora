<!DOCTYPE html>
<html lang="{{ str_replace('-', '_', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{--  CSRf TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--     Styles  --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">

</head>
<body>

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadown-sm ">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                {{ config('app.name', 'Laravel')}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Togle Navigation') }}">
                <span class="navbar-toggle-icon"></span>

            </button>
            <ul class="navbar-nav mr-auto">
                <li>
                    <a href="{{ route('producto_index') }}" class="nav-link">Productos</a>
                </li>
            </ul>


            </li>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{--  Left sider of Navbar  --}}
                <ul class="navbar-nav mr-auto">

                </ul>


                {{--  Right sider of Navbar  --}}
                <ul class="navbar-nav ml-auto">
                    {{--  Authentication Link  --}}

                    @guest
                        <li class="nav-item">
                            <a href="{{ route('admin_login') }}" class="nav-link">
                                {{ __('Inicio de Sesion')}}
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="#" class="dropdown-item"
                                   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="#" method="POST"
                                      style="display: none;">
                                    @csrf

                                </form>
                            </div>

                    @endguest
                </ul>

            </div>
        </div>
    </nav>
    <main class="py-4">
        @if(isset($errors) && $errors->any())
            <div class="danger alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>

</div>

{{--    Scripts --}}
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>


</body>
</html>
