<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white fixed-top shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('perpus.home') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- Search for post:start -->
            <form class="input-group my-1" action="{{ route('perpus.search') }}" method="GET">
                <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" 
                placeholder="{{ trans('perpus.form_control.input.search.placeholder') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <!-- Search for post:end -->
            <ul class="navbar-nav ml-auto">
                <!-- nav-home:start -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('perpus.home') }}">
                    {{ trans('perpus.menu.home') }}
                    </a>
                </li>
                <!-- nav-home:end -->
                <!-- nav-categories:contact -->
                {{-- <li class="nav-item">
                    <a class="nav-link" href="">
                    {{ trans('perpus.menu.contact') }}
                    </a>
                </li> --}}
                <!-- nav-tags:end -->
                <!-- Auth:start -->
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                    <a class="dropdown-item" href="{{ route('dashboard.index') }}">
                        {{ trans('perpus.menu.dashboard') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ trans('perpus.menu.logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        <!-- csrf -->
                        @csrf
                    </form>
                    </div>
                </li>
                @else
                <!-- Auth:else -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                    {{ trans('perpus.menu.login') }}
                    </a>
                </li>
                @endauth
                <!-- Auth:end -->
                <!-- lang:start -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @switch(app()->getLocale())
                        @case('id')
                            <i class="flag-icon flag-icon-id"></i>
                            @break
                        @case('en')
                            <i class="flag-icon flag-icon-gb"></i>
                            @break
                    @endswitch
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                    <a class="dropdown-item" href="{{ route('localization.switch', ['language' => 'id']) }}">
                        {{ trans('localization.id') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('localization.switch', ['language' => 'en']) }}">
                        {{ trans('localization.en') }}
                    </a>
                    </div>
                </li>
                <!-- lang:end -->
            </ul>
        </div>
    </div>
</nav>