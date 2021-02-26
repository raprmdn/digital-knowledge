
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
        <div class="nk-sidebar-element nk-sidebar-head">
            <div class="nk-sidebar-brand">
                {{-- <a href="/" class="logo-link nk-sidebar-logo">
                    <img class="logo-light logo-img" src="{{ asset('backend/images/logo.png') }}" srcset="{{ asset('backend/images/logo2x.png 2x') }}" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('backend/images/logo-dark.png') }}" srcset="{{ asset('backend/images/logo-dark2x.png 2x') }}" alt="logo-dark">
                    <img class="logo-small logo-img logo-img-small" src="{{ asset('backend/images/logo-small.png') }}" srcset="{{ asset('backend/images/logo-small2x.png 2x') }}" alt="logo-small">
                </a> --}}
                <a href="/" class="logo-link nd-sidebar-logo">
                    <h5><strong>{{ config('app.name') }}</strong></h5>
                </a>
            </div>
            <div class="nk-menu-trigger mr-n2">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
        </div><!-- .nk-sidebar-element -->
        <div class="nk-sidebar-element">
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu" data-simplebar>
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Dashboards</h6>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('menu.dashboard') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        @foreach ($menuLists as $menu)
                        @can($menu->permission_name)
                        <li class="nk-menu-item has-sub">
                            <a href="{{ $menu->url }}" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="{{ $menu->icon }}"></em></span>
                                <span class="nk-menu-text">{{ $menu->name }}</span>
                            </a>
                            <ul class="nk-menu-sub">
                                @foreach ($menu->children as $subMenu)
                                <li class="nk-menu-item">
                                    <a href="{{ url($subMenu->url) }}" class="nk-menu-link"><span class="nk-menu-text">{{ $subMenu->name }}</span></a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endcan
                        @endforeach
                        <li class="nk-menu-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                                <span class="nk-menu-text">Sign-Out</span>
                            </a>
                        </li>
                    </ul><!-- .nk-menu -->
                </div><!-- .nk-sidebar-menu -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-element -->
    </div>