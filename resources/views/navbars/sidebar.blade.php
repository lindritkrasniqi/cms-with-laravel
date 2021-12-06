<div class="sidebar sidebar-dark sidebar-fixed sidebar-narrow-unfoldable" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <div class="sidebar-brand-full">
            <i class="nav-icon me-2 fa fa-chrome"></i> <span class="fw-bold">Chrome</span>
        </div>
        <div class="sidebar-brand-narrow">
            <i class="nav-icon fa fa-chrome"></i>
        </div>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <li class="nav-item">
                                <a @class(['nav-link', 'active' => Route::is('home')]) href="{{ route('home') }}">
                                    <i class="fa fa-dashboard nav-icon"></i> Dashboard<span
                                        class="badge badge-sm bg-info ms-auto">NEW</span>
                                </a>
                            </li>

                            <li class="nav-title">New</li>
                            <li class="nav-item">
                                <a class="nav-link" href="colors.html">
                                    <i class="nav-icon fa fa-clone"></i> Pages
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="colors.html">
                                    <i class="nav-icon fa fa-plus-square-o"></i> Posts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="typography.html">
                                    <i class="nav-icon fa fa-minus-square-o"></i> Categories
                                </a>
                            </li>

                            <li class="nav-title">Theme</li>
                            <li class="nav-item">
                                <a class="nav-link" href="colors.html">
                                    <i class="nav-icon fa fa-eyedropper"></i> Colors
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="typography.html">
                                    <i class="nav-icon fa fa-pencil"></i> Typography
                                </a>
                            </li>

                            <li class="nav-title">Menage</li>
                            <li class="nav-item">
                                <a class="nav-link" href="colors.html">
                                    <i class="nav-icon fa fa-users"></i> Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="typography.html">
                                    <i class="nav-icon fa fa-shield"></i> Roles
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</div>
