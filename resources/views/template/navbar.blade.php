<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown">
                <i class="fas fa-user-circle"></i>&nbsp; {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">
                        <i class="nav-icon fas fa-sign-out-alt"></i> &nbsp; Log Out
                    </button>
                    {{-- <a href="{{ route('logout') }}" class="dropdown-item">
                        <i class="nav-icon fas fa-sign-out-alt"></i> &nbsp; Log Out
                    </a> --}}
                </form>

            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
