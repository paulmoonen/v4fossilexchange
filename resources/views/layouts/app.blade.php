<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="row header">

            <div class="col-2">

            </div>

            <div class="col-8">
                <a class="navbar-brand" href="/">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @if(auth()->guest())
                <p>You are currently not logged in</p>
                <a href="/login">log in</a>
                <br>
                <a href="/register">register</a>
                <br>
                @endif

                @if(auth()->check() )
                <!-- either an admin or a customer is logged in -->

                @if(Auth::user()->role == 2)
                <p>welcome back {{Auth::user()->name}}.</p>
                @endif

                <!-- links for admin users -->
                @if(Auth::user()->role == 1)
                <a href="/admin">Admin work main page</a>
                <br>
                @endif

                <!-- log out requires a proper form element with csrf token-->
                <a href="/logout" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    log out
                </a>

                <form id="logout-form" action="/logout" method="POST" class="d-none">
                    @csrf
                </form>

                @endif

            </div>
            <div class="col-2"></div>

        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer">
            <h2>Legal notices</h2>
        </footer>
    </div>
</body>

</html>