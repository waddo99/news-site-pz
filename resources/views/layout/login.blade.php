<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link {{ Request::is('user') ? ' active' : '' }}" href="{{  route('login') }}">Login</a>
        </li>
    @else
        <li class="nav-item nav-link d-flex">


            <div class="dropdown">
                <a class="nav-link dropdown-toggle "
                   type="button" id="dropdownMenuRules" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }} [{{ Auth::user()->role->first()->role  }}]
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuRules">
                    <li>
                    <a href="{{ route('logout') }}"
                       title="Logout"
                       class="dropdown-item"
                       >
                        Logout
                    </a>
                    </li>
                </ul>
            </div>
        </li>
    @endguest
</ul>
