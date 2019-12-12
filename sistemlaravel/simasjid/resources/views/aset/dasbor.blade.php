@include('layouts.header')
@include('layouts.navbar')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div>
                <ol class="breadcrumb float-sm-left" style="margin-bottom: 10px; margin-left: 15px;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-mosque"></i> Home</a></li>
                    <li class="breadcrumb-item active">Manajemen Aset</li>
                </ol>
            </div>
        </div>
        <div class="section-header">
            <h1><i class="fa fa-tachometer-alt"></i> Dasbor Manajemen Aset</h1>
        </div>
        <!-- row 1 -->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-warning bg-warning">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <a href="{{ route('usulanTerdaftar') }}">
                                <h4>Usulan Belum Diputuskan</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            {{ $jml_usulan_menunggu }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <a href="{{ route('usulanTerdaftar') }}">
                                <h4>Usulan Disetujui</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            {{ $jml_usulan_disetujui }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-danger bg-danger">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <a href="{{ route('usulanTerdaftar') }}">
                                <h4>Usulan Ditolak</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            {{ $jml_usulan_ditolak }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
</div>
<script type="text/javascript">
    document.getElementById("dasbor-aset-link").classList.add("active");
    document.getElementById("dropdown-aset").classList.add("active");
</script>

@include('layouts.footer')