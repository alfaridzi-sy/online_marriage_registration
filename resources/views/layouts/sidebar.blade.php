<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="javascript:void(0)">
                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="javascript:void(0)">
                <img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon') }}.png" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="javascript:void(0)">
                            <img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="">
                        </a>
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan">Pengelolaan Data</h6>
                            <p class="lan">Jemaat, Marriage, Terms.</p>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="home"></i>
                            <span class="lan">Pengelolaan Data</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan" href="{{ route('getAllJemaat') }}">Jemaat</a></li>
                            <li><a class="lan" href="javascript:void(0)">Persyaratan Pernikahan</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="javascript:void(0)">
                            <i data-feather="check-square"></i>
                            <span>Persetujuan Pernikahan</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
