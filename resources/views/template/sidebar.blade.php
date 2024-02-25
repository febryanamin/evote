<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('img/esb logo.png') }}" alt="ESB Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">&nbsp;E-Voting Pilketum</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3 d-flex">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link" id="dataDashboard">
                        <i class="nav-icon fas fa-home"></i>&nbsp;
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pemilih.index') }}" class="nav-link" id="dataPemilih">
                        <i class="nav-icon fas fa-users"></i>&nbsp;
                        <p>Manajemen Pemilih</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kandidat.index') }}" class="nav-link" id="dataKandidat">
                        <i class="nav-icon fas fa-user-tie"></i>&nbsp;
                        <p>Manajemen Kandidat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jabatan.index') }}" class="nav-link" id="dataJabatan">
                        <i class="nav-icon fas fa-book"></i>&nbsp;
                        <p>Manajemen Jabatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('perolehan') }}" class="nav-link" id="dataPerolehan">
                        <i class="nav-icon fas fa-chart-bar"></i>&nbsp;
                        <p>Perolehan Suara</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
