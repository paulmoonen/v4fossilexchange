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
        <nav class="navbar navbar-expand-md header">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if(auth()->guest())
                    <p>You are currently not logged in</p>
                    <a href="/login">log in</a>
                    <a href="/register">register</a>
                    @endif

                    @if(auth()->check() )
                    <!-- links for client users-->
                    @if(Auth::user()->role == 2)
                    <p>welcome back {{Auth::user()->name}}.</p>

                    @endif

                    <!-- links for admin users -->
                    @if(Auth::user()->role == 1)
                    <a href="/admin">Admin work main page</a>
                    @endif

                    <a href="/logout" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        log out
                    </a>

                    <form id="logout-form" action="/logout" method="POST" class="d-none">
                        @csrf
                    </form>

                    @endif

                </div>
            </div>
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