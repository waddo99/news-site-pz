<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">Lorem News</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('publish') ? ' active' : '' }}" href="{{ route('local') }}">Local</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('publish') ? ' active' : '' }}" href="{{ route('global') }}">Global</a>
                </li>

                {{--  If atuhtenticed --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user') ? ' active' : '' }}" href="{{ route('article.index') }}">Edit Articles</a>
                </li>

                {{--  If atuhtenticed and admin--}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('log') ? ' active' : '' }}" href="">Logs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('log') ? ' active' : '' }}" href="">Administration</a>
                </li>

            </ul>
            <form class="d-flex">
                @include('layout.login')
            </form>
        </div>
    </div>
</nav>
