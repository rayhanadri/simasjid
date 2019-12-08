@include('layouts.header')
@include('layouts.navbar')
<!-- Main Content -->
<!-- <script type="text/javascript" src="{{asset('public/dist/assets/js/page/bootstrap-modal.js')}}"></script> -->
<?php
//hide untuk selain sekretaris dan ketua
$sekretaris = array(1, 3);
$inside_sekretaris = in_array($anggota->id_jabatan, $sekretaris);
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Aset Terdaftar</h1>
            <div></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- pencarian -->
                <div class="section-body" style="padding:20px;">
                    <div class="card" style="margin-bottom: 0px;">
                        <button class="btn btn-info" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="margin: 5px; width:100%;">
                            <i class="fas fa-search"></i> Pencarian
                        </button>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                            <div class="card-body" style="padding: 10px auto;">
                                <!-- <h6 style="text-align: center;">Pencarian</h6> -->
                                <!-- Pencarian Pakai JQuery -->
                                <div class="column-search"></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card" style="margin-bottom: 0px;">
                        <button class="btn btn-info" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="margin: 5px; width:100%;">
                            <i class="fas fa-tasks"></i> Pengelolaan
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                        <div class="card-body"> -->
                    <!-- Tombol -->
                    <!-- <h6 style=" text-align: center;">Kelola Aset</h6>
                            <div class="wrapper" style="margin-top:20px; text-align: center;">
                                <button class="btn btn-lg btn-info btn-primary col-lg-3" style="margin: auto; width:100%;"><i class="fas fa-clipboard-list"></i> Registrasi Aset</button>
                                <button class="btn btn-lg btn-info btn-primary col-lg-3" style="margin: auto; width:100%;"><i class="fas fa-clipboard-list"></i> Pelaporan Aset</button>
                                <button class="btn btn-lg btn-info btn-primary col-lg-3" style="margin: auto; width:100%;"><i class="fas fa-clipboard-list"></i> asdasd Aset</button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="row" style="padding: 10px;">
            <div class="col-3">
                <h6 style="text-align: left;">Kategori </h6>
                <form action="{{ route('home') }}/aset" method="post" style="margin-bottom: 5px;">
                    @csrf
                    <select name="id" class="form-control select2" onchange="this.form.submit()">
                        <option value="0" selected>Semua Kategori</option>
                        <option value="1">Alat Dapur</option>
                        <option value="2">Alat Pertukangan</option>
                        <option value="3">Alat Kebersihan</option>
                        <option value="4">Alat Elektronik</option>
                        <option value="5">Alat Elektronik IT/Multimedia</option>
                        <option value="6">Alat Angkut</option>
                        <option value="7">Alat Rumah Tangga</option>
                        <option value="8">Alat Lainnya</option>
                    </select>
                </form>
            </div>
            <div class="col-3">
                <h6 style="text-align: left;">Jenis Barang </h6>
                <form action="{{ route('home') }}/aset" method="GET" style="margin-bottom: 5px;">
                    <select name="id" class="form-control select2" onchange="this.form.submit()">
                        <option value="0" selected>Semua Jenis Barang</option>
                        <option value="1">Mobil</option>
                        <option value="2">Motor</option>
                        <option value="3">Sapu</option>
                        <option value="4">AC</option>
                        <option value="5">Vacuum Cleaner</option>
                        <option value="6">Kursi</option>
                        <option value="7">Meja</option>
                        <option value="8">Lainnya</option>
                    </select>
                </form>
            </div>
            <div class="col-6">
                <div class="wrapper" style="text-align: right; margin:10px; width:100%">
                    <h6 style="text-align: right;">Cetak Dokumen </h6>
                    <div class="export-table" style="display:inline-block;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-lg-3">
                <div class="section-body" style="padding:20px;">
                    <h6 style="text-align: center;">Kategori Aset</h6>
                    <div class="wrapper" style="margin-top:20px;">
                        <form action="{{ route('home') }}/aset" method="get">
                            <select name="id" class="form-control select2">
                                <option value="0" selected>Semua Kategori</option>
                                <option value="1">Tanah dan Bangunan</option>
                                <option value="2">Alat Angkut</option>
                                <option value="3">Elektronik IT/Multimedia</option>
                                <option value="3">Elektronik</option>
                                <option value="4">Alat Dapur</option>
                                <option value="4">Alat Pertukangan</option>
                                <option value="5">Perlengkapan Ibadah</option>
                                <option value="6">Buku</option>
                                <option value="7">Perabotan</option>
                                <option value="8">Lain-lain</option>
                            </select>
                            <button type="submit" class="btn btn-lg btn-primary" style="margin-top: 10px; width:100%;"><i class="fas fa-desktop"></i> Tampilkan Aset</button>
                        </form> -->
            <!-- <button class="btn btn-lg btn-info" style="margin: 5px; width:100%;">Tampilkan Semua</button>
                        <button class="btn btn-lg btn-info" style="margin: 5px; width:100%;">Alat Dapur</button>
                        <button class="btn btn-lg btn-info" style="margin: 5px; width:100%;">Alat Sholat</button>
                        <button class="btn btn-lg btn-info" style="margin: 5px; width:100%;">Elektronik IT/Multimedia</button>
                        <button class="btn btn-lg btn-info" style="margin: 5px; width:100%;">Elektronik</button>
                        <button class="btn btn-lg btn-info" style="margin: 5px; width:100%;">Alat Angkut</button>
                        <button class="btn btn-lg btn-info" style="margin: 5px; width:100%;">Lain-lain</button>
                        <button class="btn btn-lg btn-info" style="margin: 5px; width:100%;">Perabotan</button>
                        <button class="btn btn-lg btn-info" style="margin: 5px; width:100%;">Tanah dan Bangunan</button><br> -->
            <!-- </div>
                </div> -->
            <!-- <div class="section-body">
                    <div class="wrapper" style="text-align: center;">
                        <h6 style="text-align: center;">Aset Tidak Aktif</h6>
                        <button class="btn btn-lg btn-danger" style="margin: 5px; width:100%;"><i class="fas fa-trash"></i> Aset Tidak Aktif </button>
                    </div>
                </div> -->
            <!-- <div class="section-body">
                    <div class="wrapper" style="text-align: center;">
                        <h6 style="text-align: center;">Pengelolaan Aset</h6>
                        <button class="btn btn-lg btn-secondary" style="margin: 5px; width:100%;"><i class="fas fa-clipboard-list"></i> Registrasi Aset </button>
                        <button class="btn btn-lg btn-secondary" aria-pressed="true" style="margin: 5px; width:100%;"><i class="fas fa-warehouse"></i> Lokasi Penyimpanan </button>
                    </div>
                </div> -->
        </div>
        <div class="col-12">
            <div class="section-body" style="min-height: 300px; padding-left:10px; padding:10px; width: 100%;">
                <table id="table_id" class="table table-striped table-bordered" style="padding:0px; table-layout:auto;">
                    <thead>
                        <tr>
                            <th class="dt-center">No. Registrasi</th>
                            <th class="dt-center">Kategori</th>
                            <th class="dt-center">Jenis Barang</th>
                            <th class="dt-center">Merek</th>
                            <th class="dt-center">Model</th>
                            <th class="dt-center">Kondisi</th>
                            <th class="dt-center">No. Seri</th>
                            <th class="dt-center">Lokasi</th>
                            <th class="dt-center">Keterangan</th>
                            <th class="dt-center">Penanggung Jawab</th>
                            <th class="dt-center">Tgl. Registrasi</th>
                            <th class="dt-center">Batas Pakai (Tahun)</th>
                            <th class="dt-center">Masa Pakai (Tahun)</th>
                            <th class="dt-center">Nilai Perolehan (Rp)</th>
                            <th class="dt-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alat Angkut</td>
                            <td>Sepeda Motor</td>
                            <td>Honda</td>
                            <td>Beat 125cc</td>
                            <td>Baik</td>
                            <td>N 1234 AB</td>
                            <td>Parkiran</td>
                            <td>Warna Merah</td>
                            <td>Pak Adi</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(15000000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Alat Angkut</td>
                            <td>Mobil</td>
                            <td>Toyota</td>
                            <td>Avanza 1000cc</td>
                            <td>Baik</td>
                            <td>N 5678 AB</td>
                            <td>Parkiran</td>
                            <td>Warna Hitam</td>
                            <td>Pak Adi</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(200000000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Alat Elektronik</td>
                            <td>AC</td>
                            <td>Sharp</td>
                            <td>Split 1PK</td>
                            <td>Baik</td>
                            <td>34534131231</td>
                            <td>Ruang Utama</td>
                            <td>-</td>
                            <td>Pak Mega</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(2000000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Alat Elektronik IT/Multimedia</td>
                            <td>Proyektor</td>
                            <td>HP</td>
                            <td>BF 1080P</td>
                            <td>Baik</td>
                            <td>N123213</td>
                            <td>Gudang 1</td>
                            <td>-</td>
                            <td>Pak Mega</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(1500000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Alat Elektronik IT/Multimedia</td>
                            <td>Layar Proyektor</td>
                            <td>Microvision</td>
                            <td>Mwsmv1515L</td>
                            <td>Baik</td>
                            <td>-</td>
                            <td>Gudang 1</td>
                            <td>-</td>
                            <td>Pak Mega</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(7000000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Alat Elektronik</td>
                            <td>Pompa Air</td>
                            <td>Sanyo</td>
                            <td>PDH 250 B</td>
                            <td>Baik</td>
                            <td>32141123</td>
                            <td>Tempat Wudhu</td>
                            <td>-</td>
                            <td>Pak Mega</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(1250000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Alat Elektronik IT/Multimedia</td>
                            <td>Monitor</td>
                            <td>Samsung</td>
                            <td>LCD 24 Inch</td>
                            <td>Baik</td>
                            <td>234234122</td>
                            <td>Ruang Utama</td>
                            <td>-</td>
                            <td>Pak Mega</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(2100000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Alat Elektronik IT/Multimedia</td>
                            <td>Monitor</td>
                            <td>Samsung</td>
                            <td>LCD 24 Inch</td>
                            <td>Baik</td>
                            <td>234234124</td>
                            <td>Ruang Utama</td>
                            <td>-</td>
                            <td>Pak Mega</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(2100000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Alat Elektronik IT/Multimedia</td>
                            <td>Monitor</td>
                            <td>BenQ</td>
                            <td>LCD 21 Inch</td>
                            <td>Baik</td>
                            <td>-</td>
                            <td>Ruang Utama</td>
                            <td>-</td>
                            <td>Pak Mega</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(1200000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Alat Rumah Tangga</td>
                            <td>Meja</td>
                            <td>-</td>
                            <td>Kayu</td>
                            <td>Baik</td>
                            <td>-</td>
                            <td>Ruang Utama</td>
                            <td>-</td>
                            <td>Pak Mega</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(2500000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Alat Rumah Tangga</td>
                            <td>Kursi</td>
                            <td>Chitose</td>
                            <td>Lipat Besi</td>
                            <td>Baik</td>
                            <td>-</td>
                            <td>Ruang Utama</td>
                            <td>-</td>
                            <td>Pak Mega</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(300000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Alat Rumah Tangga</td>
                            <td>Meja</td>
                            <td>Olympic</td>
                            <td>Kayu</td>
                            <td>Baik</td>
                            <td>-</td>
                            <td>Ruang Utama</td>
                            <td>-</td>
                            <td>Pak Mega</td>
                            <td>20/10/2019</td>
                            <td>5</td>
                            <td>2</td>
                            <td class="dt-right"><?php echo number_format(800000, 0, ',', '.'); ?></td>
                            <td class="dt-center">
                                <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="#" data-target="#detailModal"><i class="fas fa-info-circle"></i> Lihat</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Modal Detail -->
    <div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup.">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" id="detailFoto" class="img-thumbnail rounded mx-auto d-block" alt="foto profil" style="width:250px; height:250px;overflow: hidden;">
                    <table class="table table-borderless" style="width:90%; margin: auto;">
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td id="detailNama"></td>
                            </tr>
                            <tr>
                                <th scope="row">Jabatan</th>
                                <td id="detailJabatan"></td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td class="font-status" id="detailStatus"></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td id="detailEmail"></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td id="detailAlamat"></td>
                            </tr>
                            <tr>
                                <th scope="row">Telp/HP</th>
                                <td id="detailTelp"></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <input type="text" id="anggotaId" name="anggotaId" value="" hidden/> -->
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup.</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Akun Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup.">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ route('home') }}/public/dist/assets/img/svg/trash.svg" id="detailFoto" class="mx-auto d-block" alt="hapus image" style="width:150px; height:150px;overflow: hidden;">

                    <h5 align="center">Apakah Anda yakin ingin menghapus akun anggota ini?</h5>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="{{ route('anggotaDelete') }}" method="post">
                        @csrf
                        <input type="text" id="anggotaId" name="anggotaId" value="" hidden />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Batalkan.</button>
                        <input type="submit" value="Ya, Hapus." class="btn btn-danger" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <form action="{{ route('anggotaEdit') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup.">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless" style="width:90%; margin: auto;">

                            <tbody>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td><input name="nama" id="editNama" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jabatan</th>
                                    <td><select id="editJabatan" name="id_jabatan" class="form-control select">
                                            <option value=9>Remaja Masjid</option>
                                            <option value=8>Takmir</option>
                                            <option value=7>Keamanan</option>
                                            <option value=6>Humas</option>
                                            <option value=5>Kepala Rumah Tangga</option>
                                            <option value=4>Kerohanian</option>
                                            <option value=3>Sekretaris</option>
                                            <option value=2>Bendahara</option>
                                            <option value=1>Ketua</option>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td><select id="editStatus" name="id_status" class="form-control select">
                                            <option value=1>Aktif</option>
                                            <option value=2>Non-Aktif</option>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Username</th>
                                    <td><input name="username" id="editUsername" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><input type="email" name="email" id="editEmail" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td><input name="alamat" id="editAlamat" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th scope="row">Telp/HP</th>
                                    <td><input name="telp" id="editTelp" class="form-control" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <input type="text" id="anggotaId" name="anggotaId" value="" hidden />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan.</button>
                        <input type="submit" value="Konfirmasi Edit." class="btn btn-warning" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT -->
    <script type="text/javascript">
        //JS halaman aktif
        document.getElementById("terdaftar-aset-link").classList.add("active");
        document.getElementById("dropdown-aset").classList.add("active");
    </script>

    <script type="text/javascript">
        //JQuery Pencarian Berdasarkan Kriteria
        function format(d) {
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<td>Full name:</td>' +
                '<td>' + d.name + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extension number:</td>' +
                '<td>' + d.extn + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extra info:</td>' +
                '<td>And any further details here (images etc)...</td>' +
                '</tr>' +
                '</table>';
        }
        $(document).ready(function() {
            var table = $('#table_id').DataTable({
                "scrollX": true,
                "paging": true,
                "searching": true,
                dom: 'lfrtip',
                //kriteria column 0 nama tipe input
                initComplete: function() {

                    this.api().columns([0]).every(function() {
                        var that = this;
                        var input = $('<input class="form-control select" placeholder="No Registrasi..." style="margin-bottom:10px;"></input>')
                            .appendTo($(".column-search"))
                            .on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that
                                        .search(this.value)
                                        .draw();
                                }
                            });
                    });
                    //kriteria column 0 nama tipe select
                    this.api().columns([1]).every(function() {
                        var column = this;
                        var select = $('<select class="form-control select2" style="margin-bottom:10px; width:100%;"><option value="">Kategori...</option></select>')
                            // .appendTo($(column.header()).empty())
                            .appendTo($(".column-search"))
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                    this.api().columns([2]).every(function() {
                        var column = this;
                        var select = $('<select class="form-control select2" style="margin-bottom:10px; width:100%;"><option value="">Jenis...</option></select>')
                            // .appendTo($(column.header()).empty())
                            .appendTo($(".column-search"))
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                    this.api().columns([3]).every(function() {
                        var column = this;
                        var select = $('<select class="form-control select2" style="margin-bottom:10px; width:100%"><option value="">Merk...</option></select>')
                            // .appendTo($(column.header()).empty())
                            .appendTo($(".column-search"))
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });


            var today = new Date();
            var date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
            new $.fn.dataTable.Buttons(table, {
                buttons: [{
                        extend: 'pdf',
                        orientation: 'landscape',
                        title: 'SI MASJID IBNU SINA - ASET TERDAFTAR',
                        messageTop: 'Dokumen ini dibuat pada tanggal ' + date,
                        pageSize: 'A4',
                        customize: function(doc) {
                            doc.pageMargins = [10, 20, 10, 10];
                        },
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        className: 'btn btn-sm btn-secondary',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13] // indexes of the columns that should be printed,
                        } // Exclude indexes that you don't want to print.
                    },
                    // {
                    //     extend: 'csv',
                    //     title: 'SI MASJID IBNU SINA - ASET TERDAFTAR',
                    //     className: 'btn btn-sm btn-secondary',
                    //     text: '<i class="fas fa-file-csv"></i> CSV',
                    //     exportOptions: {
                    //         columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                    //     }

                    // },
                    {
                        extend: 'excel',
                        title: 'SI MASJID IBNU SINA - ASET TERDAFTAR',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        className: 'btn btn-sm btn-secondary',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                        },
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];

                            $('row n', sheet).attr('s', '50');
                        }
                    },
                    {
                        extend: 'print',
                        title: 'SI MASJID IBNU SINA - ASET TERDAFTAR',
                        messageTop: 'Dokumen ini dibuat pada tanggal ' + date,
                        text: '<i class="fas fa-print"></i> Print',
                        className: 'btn btn-sm btn-secondary',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                        },
                        customize: function(win) {

                            var last = null;
                            var current = null;
                            var bod = [];

                            var css = '@page { size: landscape; }',
                                head = win.document.head || win.document.getElementsByTagName('head')[0],
                                style = win.document.createElement('style');

                            style.type = 'text/css';
                            style.media = 'print';

                            if (style.styleSheet) {
                                style.styleSheet.cssText = css;
                            } else {
                                style.appendChild(win.document.createTextNode(css));
                            }

                            head.appendChild(style);
                        }
                    }
                ]
            });
            table.buttons().container().appendTo($(".export-table"));

        });
    </script>
    <script type="text/javascript">
        function printData() {
            var divToPrint = document.getElementById("table_id");
            newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }
    </script>
    <script type="text/javascript">
        // onclick btn delete, show modal
        $(document).on("click", ".open-delete", function() {
            /* passing data dari view button detail ke modal */
            var thisDataAnggota = $(this).data('id');
            $(".modal-footer #anggotaId").val(thisDataAnggota);
        });
        // onclick btn edit, show modal
        $(document).on("click", ".open-edit", function() {
            /* passing data dari view button detail ke modal */
            var thisDataAnggota = $(this).data('id');
            $(".modal-footer #anggotaId").val(thisDataAnggota);
            var linkDetail = "{{ route('home') }}/anggota/detail/" + thisDataAnggota;
            $.get(linkDetail, function(data) {
                //deklarasi var obj JSON data detail anggota
                var obj = data;
                // ganti elemen pada dokumen html dengan hasil data json dari jquery
                $(".modal-body #editNama").val(obj.nama);
                $(".modal-body #editJabatan").val(obj.id_jabatan);
                $(".modal-body #editStatus").val(obj.id_status);
                $(".modal-body #editUsername").val(obj.username);
                $(".modal-body #editEmail").val(obj.email);
                $(".modal-body #editAlamat").val(obj.alamat);
                $(".modal-body #editTelp").val(obj.telp);
                //base root project url + url dari db
                var link_foto = "{{ route('home') }}/" + obj.link_foto;
                document.getElementById("detailFoto").src = link_foto;
                // console.log(link_foto);
                //ganti warna status
                $(".font-status").filter(function() {
                    return $(this).text() === 'Aktif';
                }).css('color', 'green');
                //status non-aktif ubah warna merah
                $(".font-status").filter(function() {
                    return $(this).text() === 'Non-Aktif';
                }).css('color', 'red');
                //status belum verifikasi ubah warna abu2
                $(".font-status").filter(function() {
                    return $(this).text() === 'Belum Verifikasi';
                }).css('color', '#dbcb18');
            });
        });
        // onclick btn detail, show modal
        $(document).on("click", ".open-detail", function() {
            /* passing data dari view button detail ke modal */
            var thisDataAnggota = $(this).data('id');
            // $(".modal-body #anggotaId").val(thisDataAnggota);
            var linkDetail = "{{ route('home') }}/anggota/detail/" + thisDataAnggota;
            $.get(linkDetail, function(data) {
                //deklarasi var obj JSON data detail anggota
                var obj = data;
                // ganti elemen pada dokumen html dengan hasil data json dari jquery
                $("#detailNama").html(obj.nama);
                $("#detailJabatan").html(obj.jabatan);
                $("#detailStatus").html(obj.status);
                $("#detailEmail").html(obj.email);
                $("#detailAlamat").html(obj.alamat);
                $("#detailTelp").html(obj.telp);

                //base root project url + url dari db
                var link_foto = "{{ route('home') }}/" + obj.link_foto;
                $("#detailFoto").attr('src', link_foto);
                // console.log(link_foto);

                //ganti warna status
                $(".font-status").filter(function() {
                    return $(this).text() === 'Aktif';
                }).css('color', 'green');
                //status non-aktif ubah warna merah
                $(".font-status").filter(function() {
                    return $(this).text() === 'Non-Aktif';
                }).css('color', 'red');
                //status belum verifikasi ubah warna abu2
                $(".font-status").filter(function() {
                    return $(this).text() === 'Belum Verifikasi';
                }).css('color', '#dbcb18');
            });
        });
        $(document).ready(function() {
            //ganti ukuran show entry
            $(".custom-select").css('width', '82px');

            //status aktif bold
            $(".font-status").css('font-weight', 'bold');

            /* ganti warna sesuai status */
            //status aktif ubah warna hijau
            $(".font-status").filter(function() {
                return $(this).text() === 'Aktif';
            }).css('color', 'green');
            //status non-aktif ubah warna merah
            $(".font-status").filter(function() {
                return $(this).text() === 'Non-Aktif';
            }).css('color', 'red');
            //status belum verifikasi ubah warna abu2
            $(".font-status").filter(function() {
                return $(this).text() === 'Belum Verifikasi';
            }).css('color', '#dbcb18');
        });
    </script>
    @include('layouts.footer')