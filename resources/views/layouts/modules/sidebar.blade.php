<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    @role('admin')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
    @elserole('manager')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('manager.home') }}">
    @elserole('kasir')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('kasir.home') }}">
    @endrole
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kamushop</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('active-dashboard')">
        @role('admin')
            <a class="nav-link" href="{{ route('admin.home') }}">
        
        @elserole('manager')
            <a class="nav-link" href="{{ route('manager.home') }}">
        
        @elserole('kasir')
            <a class="nav-link" href="{{ route('kasir.home') }}">
        @endrole
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @role('admin')
    <li class="nav-item @yield('active-admin-barang')">
        <a class="nav-link" href="{{ route('admin.barang.index') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Barang</span>
        </a>
    </li>
    <li class="nav-item @yield('active-admin-merek')">
        <a class="nav-link collapsed" href="{{ route('admin.merek.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Merek</span>
        </a>
    </li>
    <li class="nav-item @yield('active-admin-distributor')">
        <a class="nav-link collapsed" href="{{ route('admin.distributor.index') }}" >
            <i class="fas fa-fw fa-user"></i>
            <span>Distributor</span>
        </a>
    </li>

    @elserole('manager')
    <li class="nav-item @yield('active-manager-admin')">
        <a class="nav-link" href="{{ route('manager.admin.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Admin</span>
        </a>
    </li>

    <li class="nav-item @yield('active-manager-kasir')">
        <a class="nav-link" href="{{ route('manager.kasir.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Kasir</span>
        </a>
    </li>

    <li class="nav-item @yield('active-manager-laporan')">
        <a class="nav-link" href="{{ route('manager.laporan.index') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Lihat Laporan</span>
        </a>
    </li>

    @elserole('kasir')
    <li class="nav-item @yield('active-kasir-transaksi')">
        <a class="nav-link" href="{{ route('kasir.transaksi.index') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Transaksi</span>
        </a>
    </li>
    @endrole



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
