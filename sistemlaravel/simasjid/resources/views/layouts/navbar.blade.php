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
          <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i class="fas fa-tasks"></i></a></li> -->
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-warning text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc dropdown-item-unread">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
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
                $sekretaris = array(1, 2);
                $inside_sekretaris = in_array($anggota->id_jabatan, $sekretaris);
                ?>
                @if($inside_sekretaris)
                <li id="verifikasi-link"><a class="nav-link" href="{{ route('anggotaBlmVerifikasi') }}"><i class="fas fa-check-square"></i>Verifikasi</a></a></li>
                <!-- <li id='pengelola-aset-link'><a class="nav-link" href="#"><i class="fas fa-users-cog"></i>Pengelola Keuangan</a></li> -->
                @endif
                <li id='pengelola-aset-link'><a class="nav-link" href="{{ route('anggotaPengelolaAset') }}"><i class="fas fa-users-cog"></i>Pengelola Aset</a></li>
              </ul>
            </li>
            <li id='dropdown-aset' class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-warehouse"></i> <span>Manajemen Aset</span></a>
              <ul class="dropdown-menu">
                <!-- <li><a class="nav-link" style="pointer-events: none; cursor: default;">Aset Terdaftar</a></li> -->
                <!-- <li id='terdaftar-aset-link'><a class="nav-link" href="{{ route('asetMaster') }}"><i class="fas fa-broom"></i>Peralatan</a></li>
                <li id='terdaftar-aset-link'><a class="nav-link" href="{{ route('asetMaster') }}"><i class="fas fa-boxes"></i>Perlengkapan</a></li>
                <li id='terdaftar-aset-link'><a class="nav-link" href="{{ route('asetMaster') }}"><i class="fas fa-book"></i>Buku</a></li> -->
                <!-- <li id='perbaikan-aset-link'><a class="nav-link" href="#"><i class="fas fa-tools"></i>Dalam Perbaikan</a></li> -->
                <!-- <li><a class="nav-link" href="#"><i class="fas fa-question-circle"></i>Hilang</a></li> -->
                <!-- <li id='dilepas-aset-link'><a class="nav-link" href="#"><i class="fas fa-ban"></i>Dilepas</a></li> -->
                <!-- <hr />
                <li><a class="nav-link" style="pointer-events: none; cursor: default;">Kelola Aset</a></li> -->
                <li id="status-link"><a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i>Dasbor Aset</a></li>
                <li id="usulan-link"><a class="nav-link" href="{{ route('usulanTerdaftar') }}"><i class="fas fa-lightbulb"></i>Usulan</a></li>
                <li id="pembelian-link"><a class="nav-link" href="{{ route('pembelianTerdaftar') }}"><i class="fas fa-shopping-bag"></i>Pembelian</a></li>
                <!-- <li><a class="nav-link" href="#"><i class="fas fa-gifts"></i>Hibah</a></li> -->
                <li><a class="nav-link" href="#"><i class="fas fa-boxes"></i>Inventaris</a></li>
                <!-- <li><a class="nav-link" href="#"><i class="fas fa-hand-holding"></i>Peminjaman</a></li> -->
                <!-- <li><a class="nav-link" href="#"><i class="fas fa-tools"></i>Perawatan</a></li> -->
                <!-- <li><a class="nav-link" href="#"><i class="fas fa-recycle"></i>Pelepasan</a></li> -->
                <!-- <li><a class="nav-link" href="#"><i class="fas fa-download"></i>Unduh Data</a></li> -->
                <hr />
                <!-- <li><a class="nav-link" style="pointer-events: none; cursor: default;">Pengaturan</a></li> -->
                <li id='kategori-link'><a class="nav-link" href="{{ route('kategoriTerdaftar') }}"><i class="fas fa-tags"></i>Kategori</a></li>
                <li id='katalog-link'><a class="nav-link" href="{{ route('katalogTerdaftar') }}"><i class="fas fa-list-alt"></i>Katalog</a></li>
                <!-- <li id='jenis-link'><a class="nav-link" href="{{ route('asetMaster') }}"><i class="fas fa-layer-group"></i>Jenis Barang</a></li> -->
                <li id='lokasi-link'><a class="nav-link" href="{{ route('lokasiTerdaftar') }}"><i class="fas fa-map-marker-alt"></i>Lokasi</a></li>
              </ul>
            </li>
            @endif
        </aside>
      </div>