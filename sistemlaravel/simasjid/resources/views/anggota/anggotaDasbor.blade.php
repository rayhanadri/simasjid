@include('layouts.header')
@include('layouts.navbar')
<?php
//hide untuk selain sekretaris dan ketua
$sekretaris = array(1, 2);
$inside_sekretaris = in_array($anggota->id_jabatan, $sekretaris);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div>
                <ol class="breadcrumb float-sm-left" style="margin-bottom: 10px; margin-left: 15px;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-mosque"></i> Home</a></li>
                    <li class="breadcrumb-item active">Keanggotaan</li>
                </ol>
            </div>
        </div>
        <div class="section-header">
            <h1><i class="fa fa-tachometer-alt"></i> Dasbor Anggota</h1>
        </div>
        <!-- row 1 -->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <a href="{{ route('anggotaTerdaftar') }}">
                                <h4>Anggota Aktif</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            {{ $jml_aktif }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-danger bg-danger">
                        <i class="fas fa-user-alt-slash"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <a href="{{ route('anggotaTerdaftar') }}">
                                <h4>Anggota Non-Aktif</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            {{ $jml_non_aktif }}
                        </div>
                    </div>
                </div>
            </div>
            @if($inside_sekretaris)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-warning bg-warning">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <a href="{{ route('anggotaBlmVerifikasi') }}">
                                <h4>Anggota Belum Verifikasi</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            {{ $jml_blm_verif }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <br>
</div>
<script type="text/javascript">
    document.getElementById("dasbor-anggota-link").classList.add("active");
    document.getElementById("dropdown-keanggotaan").classList.add("active");
</script>

@include('layouts.footer')