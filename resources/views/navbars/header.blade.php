<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg>
        </a>

        <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="/home">Dashboard</a></li>
        </ul>

        <ul class="header-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="icon icon-lg fa fa-bell"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="icon icon-lg fa fa-list"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="icon icon-lg fa fa-envelope-open"></i>
                </a>
            </li>
        </ul>

        <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md bg-secondary">
                        <x-avatar></x-avatar>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Account</div>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i class="icon me-2 fa fa-bell"></i>
                        Updates<span class="badge badge-sm bg-info ms-2">42</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="icon me-2 fa fa-envelope-open"></i>
                        Messages<span class="badge badge-sm bg-success ms-2">42</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="icon me-2 fa fa-list"></i>
                        Tasks<span class="badge badge-sm bg-danger ms-2">42</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="icon me-2 fa fa-comments"></i>
                        Comments<span class="badge badge-sm bg-warning ms-2">42</span>
                    </a>

                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Settings</div>
                    </div>
                    <a @class([
                        'dropdown-item',
                        'active' => Route::is('profile'),
                    ]) href="{{ route('profile') }}">
                        <i class="icon me-2 fa fa-user"></i>
                        Profile
                    </a>
                    <a @class([
                        'dropdown-item',
                        'active' => Route::is('settings'),
                    ]) href="{{ route('settings') }}">
                        <i class="icon me-2 fa fa-gear"></i>
                        Settings
                    </a>

                    <div class="dropdown-divider"></div>
                    <a @class([
                        'dropdown-item',
                        'active' => Route::is('lock'),
                    ]) href="{{ route('lock') }}">
                        <i class="icon me-2 fa fa-lock"></i> Lock Account
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off text-danger icon me-2"></i> {{ __('Logout') }}
                    </a>
                </div>
            </li>
        </ul>
    </div>

    @yield('breadcrumb')

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</header>
