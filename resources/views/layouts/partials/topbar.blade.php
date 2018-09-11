<nav class="topbar">
    <div class="topbar__title">
        {{--Modern Library--}}
        <img src="/img/logo.png" alt="Modern Library">
    </div>

    <div class="topbar__content">
        <div class="menus">
            @auth
                <span>
                            <ul class="dropdown menu" data-dropdown-menu>
                              <li>
                                <a href="#">
                                    {{Auth::user()->firstname}} {{Auth::user()->lastname}}
                                </a>
                                <ul class="menu">
                                      <li><a href="/users/show/{{auth()->user()->id}} ">Profile</a></li>
                                      <li><a href="/logout">Logout</a></li>
                                </ul>
                              </li>
                            </ul>
                </span>
            @endauth
            @guest
                <span><a href="/login">Login</a></span>
                <span><a href="/users/create">Register</a></span>
            @endguest
        </div>
    </div>

</nav>
