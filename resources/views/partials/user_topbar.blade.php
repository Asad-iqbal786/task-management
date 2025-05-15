<div class="navbar-custom">
    <div class="topbar px-2">
        <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="#" class="logo-light">
                    <img src="assets/images/logo-light.png" alt="logo" class="logo-lg">
                    <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm">
                </a>

                <!-- Brand Logo Dark -->
                <a href="#" class="logo-dark">
                    <img src="assets/images/logo-dark.png" alt="dark logo" class="logo-lg">
                    <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- Topbar Search Form -->
            <li class="app-search dropdown d-none d-lg-block">
                <form>
                    <input type="search" class="form-control" placeholder="Search...">
                    <span class="mdi mdi-magnify search-icon font-22"></span>
                </form>
            </li>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-3">

            <!-- Fullscreen Icon -->
            <li class="d-none d-md-inline-block">
                <a class="nav-link" href="#" data-toggle="fullscreen">
                    <i data-feather="maximize" class="font-22"></i>
                </a>
            </li>

            <!-- Search Icon -->
            <li class="dropdown d-lg-none">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i data-feather="search" class="font-22"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="search" class="form-control" placeholder="Search ..." aria-label="Search">
                    </form>
                </div>
            </li>

            <!-- Language Selector -->
            <li class="dropdown d-none d-md-inline-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('backend/assets/images/flags/us.jpg') }}" alt="US Flag" class="me-0 me-sm-1"
                        height="18">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="assets/images/flags/germany.jpg" alt="German Flag" class="me-1" height="12">
                        <span class="align-middle">German</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="assets/images/flags/italy.jpg" alt="Italian Flag" class="me-1" height="12"> <span
                            class="align-middle">Italian</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="assets/images/flags/spain.jpg" alt="Spanish Flag" class="me-1" height="12"> <span
                            class="align-middle">Spanish</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="assets/images/flags/russia.jpg" alt="Russian Flag" class="me-1" height="12">
                        <span class="align-middle">Russian</span>
                    </a>
                </div>
            </li>

            <!-- Light/Dark Mode -->
            <li class="d-inline-flex">
                <div class="nav-link" id="light-dark-mode">
                    <i data-feather="moon" class="font-22"></i>
                </div>
            </li>

            <!-- Settings -->
            <li>
                <a class="nav-link waves-effect waves-light" data-bs-toggle="offcanvas"
                    href="#theme-settings-offcanvas">
                    <i data-feather="settings" class="font-22"></i>
                </a>
            </li>

            <!-- Profile Menu -->
            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt="User Avatar"
                        class="rounded-circle">
                    <span class="ms-1 d-none d-md-inline-block">{{ auth()->user()->name }} <i data-feather="chevron-down"></i></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>

                    <a href="" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>{{ auth()->user()->email }}</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('user.logout') }}" class="dropdown-item notify-item">
                        <i data-feather="log-out" class="me-1"></i> <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>

    </div>
</div>
