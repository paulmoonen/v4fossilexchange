<nav class="row">

    <div class="col-2"></div>

    <div class="col-8 header">
        <a class="navbar-brand" href="/">
            {{ config('app.name', 'Laravel') }}
        </a>
        <br>
        <a href="/">Shop</a>
        <br>
        
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
            <p>Welcome back {{Auth::user()->name}}.</p>
            <a href="/user/{{Auth::user()->id}}">My Personal Page</a>
            <br>
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
        <br>
        <a href="/cart">shopping cart</a>

    </div>
    <div class="col-2"></div>

</nav>