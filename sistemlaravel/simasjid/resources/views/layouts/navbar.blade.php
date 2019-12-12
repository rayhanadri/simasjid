<body>
  <?php
  // use Illuminate\Support\Facades\Auth;

  // $user = Auth::user();
  ?>

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
              <img alt="image" src="{{ route('home') }}/{{ $anggota->link_foto }}?=<?php echo filemtime($anggota->link_foto) ?>" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"> {{$anggota->nama}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <!-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a> -->
              <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
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
            <a href="{{ route('home') }}">SIM</a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="menu-header">Dashboard</li> -->
            <li id='home-link'><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-mosque"></i> <span>Home</span></a></li>
            <!-- <li class="menu-header">Starter</li> -->
            @if($anggota->id_status == 1)
            <li class="nav-item dropdown" id="dropdown-keanggotaan">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Keanggotaan</span></a>
              <ul class="dropdown-menu">
                <li id="terdaftar-link"><a class="nav-link" href="{{ route('anggotaTerdaftar') }}"><i class="fas fa-address-book"></i>Terdaftar</a></a></li>
                <?php
                //hide untuk selain sekretaris dan ketua
                $sekretaris = array(1, 3);
                $inside_sekretaris = in_array($anggota->id_jabatan, $sekretaris);
                //apakah ada id jabatan di array sekretaris yg bernilai 1 dan 3
                ?>
                @if($inside_sekretaris)
                <li id="verifikasi-link"><a class="nav-link" href="{{ route('anggotaBlmVerifikasi') }}"><i class="fas fa-check-square"></i>Verifikasi</a></a></li>
                @endif
              </ul>
            </li>
            <li id='link-drop-aset' class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-warehouse"></i> <span>Aset</span></a>
              <ul class="dropdown-menu">
                <li id='link-master-aset'><a class="nav-link" href="#"><i class="fas fa-boxes"></i>Master Aset</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-lightbulb"></i>Perencanaan</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-clipboard-check"></i>Pengecekan</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-chart-pie"></i>Laporan</a></li>
              </ul>
            </li>
            <?php
            //hide untuk selain panitia kurban
            $panitia = array(1,10, 11);
            $inside_panitia = in_array($anggota->id_panitia, $panitia);
            $ketua_takmir = in_array($anggota->id_jabatan,$panitia);
           ?>
            @if($inside_panitia || $ketua_takmir)
            <li id='link-drop-aset' class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-kaaba"></i><span>Kurban</span></a>
              <ul class="dropdown-menu">
                @if($anggota->id_panitia == 10 || $anggota->id_jabatan == 1   )
              <li id='link-master-aset'><a class="nav-link" href="{{route('manajPanitia')}}"><i class="fas fa-briefcase"></i>Anggota Panitia</a></li>
                @endif
              <li><a class="nav-link" href="{{route('pekerjaan')}}"><i class="fas fa-briefcase"></i>Pekerjaan</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-clipboard-list"></i>Pendaftaran</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-clipboard-check"></i>Pemotongan</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-dolly-flatbed"></i>Distribusi</a></li>
              </ul>
            </li>
            @endif

            @endif
        </aside>
      </div>