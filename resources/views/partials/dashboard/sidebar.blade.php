<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{asset('assets/global/waska-library-logo.png')}}" srcset="{{asset('assets/global/waska-library-logo.png')}}" alt="logo">
                            <img class="logo-dark logo-img" src="{{asset('assets/global/waska-library-logo.png')}}" srcset="{{asset('assets/global/waska-library-logo.png')}}" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="{{asset('assets/global/waska-library-logo-only.png')}}" srcset="{{asset('assets/global/waska-library-logo-only.png')}} 2x" alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Overview</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{route('dashboard.overview.index')}}" class="nk-menu-link {{$page === 'overview' ? 'active-page' : ''}}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-home-alt"></em></span>
                                        <span class="nk-menu-text">Beranda</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Master</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item">
                                    <a href="html/pricing-table.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span>
                                        <span class="nk-menu-text">Buku</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('peminjaman.index') }}" class="nk-menu-link {{$page === 'peminjaman' ? 'active-page' : ''}}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-alarm-alt"></em></span>
                                        <span class="nk-menu-text">Pinjam</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Autentikasi</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item">
                                    <a href="html/pricing-table.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Pengguna</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/gallery.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-shield"></em></span>
                                        <span class="nk-menu-text">Hak Akses</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
