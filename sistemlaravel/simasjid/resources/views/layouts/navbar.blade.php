<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a></li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a></li> -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="public/dist/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"><?php echo Auth::user()->nama; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <!-- <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i>
                <form method="POST" enctype="multipart/form-data" action="{{ route('logout') }}">
                  @csrf
                  <input type="submit" value="Logout">
                </form>
              </a> -->
              <!-- <form method="POST" enctype="multipart/form-data" action="{{ route('logout') }}">
                <input type="submit" value="Logout">
              </form> -->
              <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <!-- <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"> -->
              <!-- @csrf
              <i class="fas fa-sign-out-alt"></i> Logout
              </a> -->

            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home') }}">SI MASJID IBNU SINA</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">LS</a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="menu-header">Dashboard</li> -->
            <li id='home-link'><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-mosque"></i> <span>Home</span></a></li>
            <!-- <li class="menu-header">Starter</li> -->
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Keanggotaan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html"><i class="fas fa-cog"></i>Pengaturan</a></li>
                <li><a class="nav-link" href="layout-transparent.html"><i class="fas fa-address-book"></i>Daftar</a></a></li>
              </ul>
            </li>
            <li id='link-drop-aset' class="nav-item dropdown active">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-warehouse"></i> <span>Aset</span></a>
              <ul class="dropdown-menu">
                <li id='link-master-aset'><a class="nav-link" href="#"><i class="fas fa-boxes"></i>Master Aset</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-lightbulb"></i>Perencanaan</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-cogs"></i>Perawatan</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-trash"></i>Tidak Terpakai</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-chart-pie"></i>Laporan</a></li>
              </ul>
            </li>
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div>
        </aside>
      </div>
      <script>document.getElementById("home-link").classList.add("active");</script>