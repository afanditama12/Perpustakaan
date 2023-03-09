<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-pied-piper-pp"></i></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config("app.name") }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ set_active('dashboard.index') }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>
                {{ trans('dashboard.link.dashboard')}}
            </span>
        </a>
    </li>

    @if(auth()->user()->can('manage_library') || auth()->user()->can('manage_data') )
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ trans('dashboard.menu.master') }}
    </div>
    @endif

    @can('manage_library')
    <!-- Nav Item - list -->
        <li class="nav-item {{ set_active(['listperpustakaan.index', 'listperpustakaan.edit', 'listperpustakaan.create']) }}">
            <a class="nav-link" href="{{ route('listperpustakaan.index') }}">
                <i class="fas fa-fw fa-list-alt"></i>
                <span>
                    {{ trans('dashboard.link.list') }}
                </span>
            </a>
        </li>
    @endcan

    @can('manage_data')
    <!-- Nav Item - entry -->
    <li class="nav-item {{ set_active(['detail-perpustakaan.index','detail-perpustakaan.edit','detail-perpustakaan.create']) }}">
        <a class="nav-link" href="{{ route('detail-perpustakaan.index') }}">
            <i class="fas fa-fw fa-vote-yea"></i>
            <span>
                {{ trans('dashboard.link.rekap') }}
            </span>
        </a>
    </li>
    @endcan

    
    @if(auth()->user()->can('manage_users') || auth()->user()->can('manage_roles') )
    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    <div class="sidebar-heading">
        {{ trans('dashboard.menu.user_permission') }}
    </div>
    @endif

    @can('manage_users')
    <!-- Nav Item - Users -->
    <li class="nav-item {{ set_active(['users.index', 'users.create', 'users.edit']) }}">
        <a class="nav-link" 
        href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>
                {{ trans('dashboard.link.users') }}
            </span>
        </a>
    </li>
    @endcan

    @can('manage_roles')
    <!-- Nav Item - Roles -->
    <li class="nav-item {{ set_active(['roles.index', 'roles.show', 'roles.create', 'roles.edit']) }}">
        <a class="nav-link" href="{{ route('roles.index') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>
                {{ trans('dashboard.link.roles') }}
            </span>
        </a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('/vendor/img/undraw_rocket.svg') }}" alt="">
        <p class="text-center mb-2">{{ trans('dashboard.label.logged_in_as') }} <strong>{{ Auth::user()-> name }}</strong></p>
    </div>

</ul>