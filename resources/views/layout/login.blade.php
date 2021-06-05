<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user') ? ' active' : '' }}" href="">Login</a>
        </li>
    @else
        <li class="nav-item nav-link d-flex">

            <a href="{{ route('user.index') }}" role="button" id="newBtn">
                {{ Auth::user()->name }} [@if(count(Auth::user()->role) > 0) {{ Auth::user()->role->first()->label }} @endif]
            </a>
        </li>
    @endguest
</ul>
