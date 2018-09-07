<nav class="topbar">
    <div class="topbar__title">
        Modern Library
    </div>

    <div class="topbar__content">
        <div class="menus">
            @auth
                <span><a href="/logout">Logout</a></span>
            @endauth
            @guest
                    <span><a href="/login">Sign In</a></span>
                    <span><a href="/register">Sign Up</a></span>
                @endguest
        </div>
    </div>

</nav>