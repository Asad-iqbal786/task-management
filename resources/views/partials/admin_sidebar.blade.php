<div class="app-sidenav">

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="#" class="logo-light">
            <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo" class="logo-lg">
            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
        </a>

        <!-- Brand Logo Dark -->
        <a href="#" class="logo-dark">
            <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg">
            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
        </a>
    </div>

    <!--- Menu -->
    <div class="h-100" data-simplebar>
        <ul class="menu">
            @auth
                <li class="menu-title">
                    Role: <span class="badge bg-success font-10">{{ ucfirst(string: auth()->user()->role) }}</span>
                </li>
            @endauth
            <li class="menu-item">
                <a href="{{route('dashboard')}}" class="menu-link">
                    <span class="menu-icon"><i data-feather="home"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <!-- #endregion -->
            <li class="menu-item">
                <a href="{{route('userIndex')}}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> User </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{route('taskIndex')}}" class="menu-link">
                    <span class="menu-icon"><i data-feather="calendar"></i></span>
                    <span class="menu-text"> Task </span>
                </a>
            </li>


        </ul>
        <!--- End Menu -->
        <div class="clearfix"></div>
    </div>
</div>
