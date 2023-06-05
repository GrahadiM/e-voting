<aside class="main-sidebar main-sidebar-custom sidebar-dark-lightblue elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dokter.dashboard') }}" class="brand-link bg-lightblue text-center">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-bold" style="color: #111111;">{{ config('app.name', 'Sistem Informasi Klinik') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('') }}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat nav-legacy"
                data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ Request::is('dokter/dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.data_pasien') }}" class="nav-link {{ Request::is('dokter/data-pasien*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Menu Data Pasien</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom accent-lightblue">
        <!-- <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a> -->

        <!-- Logout Start -->
        <a href="index.html" class="btn btn-danger hide-on-collapse btn-block"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
        <!-- Logout End -->
    </div>
    <!-- /.sidebar-custom -->
</aside>
