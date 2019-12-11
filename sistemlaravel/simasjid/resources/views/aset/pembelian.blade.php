@include('layouts.header')
@include('layouts.navbar')
<!-- Main Content -->
<!-- <script type="text/javascript" src="{{asset('public/dist/assets/js/page/bootstrap-modal.js')}}"></script> -->
<?php

use Carbon\Carbon;

Carbon::setLocale('id');
//hide untuk selain sekretaris dan ketua
$inside_pengelola = in_array($anggota->id, $list_pengelola);
?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div>
                <ol class="breadcrumb float-sm-left" style="margin-bottom: 10px; margin-left: 15px;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-mosque"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Manajemen Aset</a></li>
                    <li class="breadcrumb-item active">Pembelian</li>
                </ol>
            </div>
        </div>
        <div class="section-header">
            <div>
                <h1><i class="fa fa-shopping-bag"></i> Pembelian Barang</h1>
                <div>
                    <p style="padding: 0px 10px; margin-bottom: 0px;">Pembelian Barang berisi pembelian dari usulan barang yang sebelumnya telah disetujui dan dibuat pembeliannya. Pembelian dilakukan oleh Takmir atau Remas yang bertugas membeli barang.</p>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            Error
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('error'))

        <div class="alert alert-danger">
            Error
            <br />
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="section-body" style="margin-bottom: 10px;">
                    <!-- pencarian -->
                    <div class="card" style="margin-bottom: 0px;">
                        <button class="btn btn-info" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="margin: 5px; width:100%;">
                            <i class="fa fa-filter"></i> Filter Data
                        </button>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                            <div class="card-body" style="padding: 10px auto;">
                                <!-- Pakai JQuery -->
                                <div class="column-search"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="section-body" style="min-height: 300px;">
                    <table id="table_id" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="dt-center">ID</th>
                                <th class="dt-center">Jenis Pembelian</th>
                                <th class="dt-center">Nama Barang</th>
                                <th class="dt-center">Kategori</th>
                                <th class="dt-center" style="width: 50px;padding-right: 5px;padding-left: 5px;height: 50px;">Jumlah</th>
                                <!-- <th class="dt-center">Harga Satuan</th>
                                <th class="dt-center">Total Harga</th> -->
                                <th class="dt-center">Dibuat</th>
                                <th class="dt-center">Diperbarui</th>
                                <th class="dt-center">Status Pembelian</th>
                                <th class="dt-center">Status Inventaris</th>
                                <th class="dt-center" style="width: 5em">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_pembelian as $pembelian)
                            <tr>
                                <td>{{ $pembelian->id }}</td>
                                <td>{{ $pembelian->usulan->jenis_usulan }}</td>
                                <td>
                                    @if($pembelian->usulan->jenis_usulan == "Katalog")
                                    {{ $pembelian->usulan->katalog->nama }}
                                    @else
                                    {{ $pembelian->usulan->nama }}
                                    @endif
                                </td>
                                <td>
                                    @if($pembelian->usulan->jenis_usulan == "Katalog")
                                    {{ $pembelian->usulan->katalog->kategori->nama }}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>{{ $pembelian->usulan->jumlah }}</td>
                                <!-- <td>{{ $pembelian->harga }}</td>
                                <td>{{ $pembelian->harga * $pembelian->jumlah }}</td> -->
                                <td style="min-width: 7em;" class="harga" data-a-sign="Rp. " data-a-dec="," data-a-sep=".">{{ $pembelian->harga_pembelian }}</td>
                                <td style="min-width: 7em;" class="harga" data-a-sign="Rp. " data-a-dec="," data-a-sep=".">{{ $pembelian->harga_pembelian * $pembelian->usulan->jumlah }}</td>
                                <!-- <td>{{ $pembelian->updated_at->diffForHumans() }}</td> -->
                                <td class="font-status">{{ $pembelian->status_pembelian }}</td>
                                @if( !empty($pembelian->inventaris) )
                                <td class="font-status">Terdaftar</td>
                                @else
                                <td class="font-status">Tidak Terdaftar</td>
                                @endif
                                <td class="dt-center" style="width: 5em">
                                    <!-- <div class="btn-group mb-3" role="group" aria-label="Basic example" style="padding-left: 20px;"> -->
                                    <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="{{ $pembelian->id }}" data-target="#detailModal" style="margin-bottom: 2px; width:100%;"><i class="fas fa-glasses"></i> Detail</a>
                                    @if( ($pembelian->id_petugas == $anggota->id) && ($pembelian->status_pembelian == "Belum Dibeli") )
                                    <a href="#" class="open-update btn btn-icon btn-sm btn-primary" data-toggle="modal" data-id="{{ $pembelian->id }}" data-target="#updateModal" style="margin-bottom: 2px; width:100%;"><i class="fa fa-sync-alt"></i> Update</a>
                                    @endif
                                    @if($inside_pengelola)
                                    <a href="#" class="open-edit btn btn-icon btn-sm btn-warning" data-toggle="modal" data-id="{{ $pembelian->id }}" data-target="#editModal" style="margin-bottom: 2px; width:100%"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="open-delete btn btn-icon btn-sm btn-danger" data-toggle="modal" data-id="{{ $pembelian->id }}" data-target="#deleteModal" style="margin-bottom: 2px; width:100%"><i class="fas fa-trash"></i> Hapus</a>
                                    @endif
                                    @if( !empty($pembelian->inventaris) )
                                    <a href="{{ route('home').'/aset/pembelian/detail/'.$pembelian->inventaris->id }}" class="btn-icon btn btn-sm btn-secondary" style="margin-bottom: 2px; width:100%"><i class="fas fa-boxes"></i> Inventaris</a>
                                    @endif

                                    <!-- </div> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Detail -->
    <div class="modal fade" tabindex="-1" role="dialog" id="tambahModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pembelian Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('pembelianCreate') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Barang</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Barang" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_aset" class="col-md-4 col-form-label text-md-right">Jenis Aset</label>
                            <div class="col-md-6">
                                <select class="form-control" id="jenis_aset" name="jenis_aset" required>
                                    <option>Pilih Jenis Aset</option>
                                    <option value=1>Aset Tetap</option>
                                    <option value=2>Persediaan</option>
                                    <option value=3>Buku</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_kategori" class="col-md-4 col-form-label text-md-right">Kategori Aset</label>
                            <div class="col-md-6">
                                <select class="form-control" id="id_kategori" name="id_kategori" required>
                                    <option>Pilih Jenis Aset Dahulu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-md-4 col-form-label text-md-right">Jumlah</label>
                            <div class="col-md-6">
                                <input id="jumlah" type="number" class="form-control" name="jumlah" placeholder="Jumlah" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">Harga Satuan</label>
                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control" name="harga" placeholder="Harga Satuan" data-a-dec="," data-a-sep="." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pengelola" class="col-md-4 col-form-label text-md-right">Pembuat Pembelian</label>
                            <div class="col-md-6">
                                <input id="pengelola" type="text" class="form-control" name="pengelola" value="{{$anggota->nama}}" readonly disabled>
                                <input id="id_pengelola" type="text" class="form-control" name="id_pengelola" value="{{$anggota->id}}" readonly hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_aset" class="col-md-4 col-form-label text-md-right">Petugas Pembelian</label>
                            <div class="col-md-6">
                                <select class="form-control select2" id="id_petugas" name="id_petugas" style="width:100%" required>
                                    @foreach ($list_anggota as $anggota_dalam_list)
                                    <?php
                                    $id = $anggota_dalam_list->id;
                                    $nama = $anggota_dalam_list->nama;
                                    ?>
                                    <option value="<?php echo $id ?>"> <?php echo $nama ?></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <input type="text" id="pembelianId" name="pembelianId" value="" hidden/> -->
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Buat Pembelian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Usulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ route('home') }}/public/dist/assets/img/svg/trash.svg" id="detailFoto" class="mx-auto d-block" alt="hapus image" style="width:150px; height:150px;overflow: hidden;">

                <h5 align="center">Apakah Anda yakin ingin menghapus pembelian ini?</h5>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <form action="{{ route('pembelianDelete') }}" method="post">
                    @csrf
                    <input type="text" id="pembelianId" name="pembelianId" value="" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Batalkan</button>
                    <input type="submit" value="Ya, Hapus" class="btn btn-danger" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Sudah Dibeli -->
<div class="modal fade" tabindex="-1" role="dialog" id="sudahDibeliModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Barang Sudah Dibeli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:center">
                <!-- <img src="{{ route('home') }}/public/dist/assets/img/svg/trash.svg" id="detailFoto" class="mx-auto d-block" alt="hapus image" style="width:150px; height:150px;overflow: hidden;"> -->
                <div style="font-size: 10em;"><i class="fa fa-check-square"></i></div>
                <h5 align="center">Apakah Anda yakin sudah menyelesaikan pembelian ini?</h5>
                <h7 align="center">Pastikan kembali Anda telah memperbarui pembelian dan upload nota.</h7>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <form action="{{ route('pembelianSudahBeli') }}" method="post">
                    @csrf
                    <input type="text" id="pembelianId" name="pembelianId" value="" hidden />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Batalkan</button>
                    <input type="submit" value="Ya, Sudah Dibeli" class="btn btn-primary" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Sudah Diterima -->
<div class="modal fade" tabindex="-1" role="dialog" id="sudahDiterimaModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Barang Sudah Diterima</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:center">
                <!-- <img src="{{ route('home') }}/public/dist/assets/img/svg/trash.svg" id="detailFoto" class="mx-auto d-block" alt="hapus image" style="width:150px; height:150px;overflow: hidden;"> -->
                <div style="font-size: 10em;"><i class="fa fa-people-carry"></i></div>
                <h5 align="center">Apakah Anda yakin sudah menerima barang hasil pembelian ini?</h5>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <form action="{{ route('pembelianSudahDiterima') }}" method="post">
                    @csrf
                    <input type="text" id="pembelianId" name="pembelianId" value="" hidden />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Batalkan</button>
                    <input type="submit" value="Ya, Sudah Diterima" class="btn btn-primary" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <form method="POST" enctype="multipart/form-data" action="{{ route('pembelianEdit') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table style="width:90%; margin: auto;">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Barang</th>
                                <td><input class="form-control" type="text" id="editNama" name="editNama" required /></td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Aset</th>
                                <td><select id="editJenis" name="editJenis" class="form-control select" required>
                                        <option value=1>Aset Tetap</option>
                                        <option value=2>Persediaan</option>
                                        <option value=3>Buku</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori Aset</th>
                                <td><select id="editKategori" name="editKategori" class="form-control select" required>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Jumlah</th>
                                <td><input type="number" id="editJumlah" name="editJumlah" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th scope="row">Harga Satuan</th>
                                <td><input type="number" id="editHarga" name="editHarga" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th scope="row">Petugas Pembelian</th>
                                <td>
                                    <select class="form-control select2" id="editPetugas" name="editPetugas" style="width:100%" required>
                                        @foreach ($list_anggota as $anggota_dalam_list)
                                        <?php
                                        $id = $anggota_dalam_list->id;
                                        $nama = $anggota_dalam_list->nama;
                                        ?>
                                        <option value="<?php echo $id ?>"> <?php echo $nama ?></option>
                                        @endforeach
                                    </select>
                                <td>
                            </tr>
                            <tr>
                                <th scope="row">Toko/Penjual</th>
                                <td><input type="text" id="editPenjual" name="editPenjual" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th scope="row">Telp Toko/Penjual</th>
                                <td><input type="text" id="editTelpPenjual" name="editTelpPenjual" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th scope="row">Status Pembelian</th>
                                <td>
                                    <select id="editStatus" name="editStatus" class="form-control select" required>
                                        <option value="Belum Dibeli">Belum Dibeli</option>
                                        <option value="Sudah Dibeli">Sudah Dibeli</option>
                                        <option value="Sudah Diterima">Sudah Diterima</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Nota Pembelian</th>
                                <td>
                                    <input type="file" name="file" id="fileChooser2" accept="image/.gif, .png, .jpg, .jpeg, .bmp" class="form-control" onchange="return ValidateFileUpload2()">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <input type="text" id="pembelianId" name="pembelianId" value="" hidden />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <input type="submit" value="Konfirmasi Edit" class="btn btn-warning" />
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Update -->
<div class="modal fade" tabindex="-1" role="dialog" id="updateModal">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('pembelianUpdate') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="id_pengelola" type="text" class="form-control" name="id_pengelola" value="{{$anggota->id}}" readonly hidden />
                    <table style="width:90%; margin: auto;">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Barang</th>
                                <td><input class="form-control" type="text" id="updateNama" name="updateNama" readonly disabled /></td>
                            </tr>
                            <tr>
                                <th scope="row">Jumlah</th>
                                <td><input type="number" id="updateJumlah" name="updateJumlah" class="form-control" onchange="return calc_total()" /></td>
                            </tr>
                            <tr>
                                <th scope="row">Harga Satuan</th>
                                <td><input type="number" id="updateHarga" name="updateHarga" class="form-control" onchange="return calc_total()" /></td>
                            </tr>
                            <tr>
                                <th scope="row">Total Harga</th>
                                <td><input type="text" id="updateTotalHarga" name="updateTotalHarga" class="form-control" data-a-dec="," data-a-sep="." disabled /></td>
                            </tr>
                            <tr>
                                <th scope="row">Toko/Penjual</th>
                                <td><input type="text" id="updatePenjual" name="updatePenjual" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th scope="row">Telp Toko/Penjual (Jika Ada)</th>
                                <td><input type="text" id="updateTelpPenjual" name="updateTelpPenjual" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th scope="row">Nota Pembelian</th>
                                <td>
                                    <input type="file" name="file" id="fileChooser" accept="image/.gif, .png, .jpg, .jpeg, .bmp" class="form-control" onchange="return ValidateFileUpload()">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr />
                    <div style="text-align:center" class="card" style="margin-bottom: 0px;">
                        <a href="#" class="btn btn-info" data-toggle="collapse" data-target="#collapseNotaUpdate" aria-expanded="false" aria-controls="collapseOne" style="margin: 5px; width:100%;">
                            <i class="fa fa-receipt"></i> Nota </a>
                        <div id="collapseNotaUpdate" class="collapse">
                            <div class="card-body" style="padding: 10px auto;">
                                <img src="" id="detailNotaUpdate" class="rounded mx-auto d-block" alt="foto nota" style="max-width:400px; overflow: hidden;">
                                <a href="#" id="lihatNotaUpdate" class="btn btn-sm btn-info btn-primary" style="margin-top: 1em;" target="_blank"><i class="fas fas fa-window-maximize"></i> Lihat Nota</a>
                                <a href="#" id="downloadNotaUpdate" class="btn btn-sm btn-info btn-primary" style="margin-top: 1em;" download><i class="fas fas fa-download"></i> Download Nota</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <input type="text" id="pembelianId" name="pembelianId" value="" hidden />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <input type="submit" value="Konfirmasi Update" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Upload Nota -->
<div class="modal fade" tabindex="-1" role="dialog" id="uploadModal">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('pembelianEdit') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="id_pengelola" type="text" class="form-control" name="id_pengelola" value="{{$anggota->id}}" readonly hidden>
                    <table style="width:90%; margin: auto;">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Barang</th>
                                <td><input class="form-control" type="text" id="editNama" name="editNama" /></td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Aset</th>
                                <td><select id="editJenis" name="editJenis" class="form-control select">
                                        <option value=1>Aset Tetap</option>
                                        <option value=2>Persediaan</option>
                                        <option value=3>Buku</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori Aset</th>
                                <td><select id="editKategori" name="editKategori" class="form-control select">
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Jumlah</th>
                                <td><input type="number" id="editJumlah" name="editJumlah" class="form-control"></td>
                            </tr>
                            <tr>
                                <th scope="row">Harga Satuan</th>
                                <td><input type="number" id="editHarga" name="editHarga" class="form-control" /></td>
                            </tr>
                            <!-- <tr>
                                <th scope="row">Dibuat</th>
                                <td>
                                    <input type='text' id="editDibuat" class="form-control" />
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </td>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Diperbarui</th>
                                <td><input type='text' id="editDiperbarui" class="form-control" />
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Dibuat oleh</th>
                                <td><input type='text' id="editDibuatOleh" class="form-control" readonly disabled /></td>
                            </tr>
                            <tr>
                                <th scope="row">Diperbarui oleh</th>
                                <td><input type='text' id="editDiperbaruiOleh" class="form-control" readonly disabled /></td>
                            </tr> -->
                            <tr>
                                <th scope="row">Status</th>
                                <td>
                                    <select id="editStatus" name="editStatus" class="form-control select">
                                        <option value="Ditolak">Ditolak</option>
                                        <option value="Diterima">Diterima</option>
                                        <option value="Menunggu Keputusan">Menunggu Keputusan</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <input type="text" id="pembelianId" name="pembelianId" value="" hidden />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <input type="submit" value="Konfirmasi Edit" class="btn btn-warning" />
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Detail -->
<div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table style="width:90%; margin: auto;">
                    <tbody>
                        <tr>
                            <th scope="row">Nama Barang</th>
                            <td id="detailNama"></td>
                        </tr>
                        <tr>
                            <th scope="row">Kategori Aset</th>
                            <td id="detailKategori"></td>
                        </tr>
                        <tr>
                            <th scope="row">Jumlah</th>
                            <td id="detailJumlah"></td>
                        </tr>
                        <tr>
                            <th scope="row">Harga Satuan</th>
                            <td><span id="detailHarga" data-a-dec="," data-a-sep="."></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Total Harga</th>
                            <td><span id="detailTotal" data-a-dec="," data-a-sep="."></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Dibuat</th>
                            <td id="dibuat"></td>
                        </tr>
                        <tr>
                            <th scope="row">Diperbarui</th>
                            <td id="diperbarui"></td>
                        </tr>
                        <tr>
                            <th scope="row">Pembuat Pembelian</th>
                            <td id="detailPengelola"></td>
                        </tr>
                        <tr>
                            <th scope="row">Petugas Pembelian</th>
                            <td id="detailPetugas"></td>
                        </tr>
                        <tr>
                            <th scope="row">Toko/Penjual</th>
                            <td id="detailPenjual"></td>
                        </tr>
                        <tr>
                            <th scope="row">Telp Toko/Penjual</th>
                            <td id="detailTelpPenjual"></td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td id="detailStatus" class="font-status"></td>
                        </tr>
                        <tr>
                            <th scope="row">Nota</th>
                            <td id="detailUploadNota" class="font-status"></td>
                        </tr>
                    </tbody>
                </table>
                <hr />
                <div style="text-align:center" class="card" style="margin-bottom: 0px;">
                    <button class="btn btn-info" data-toggle="collapse" data-target="#collapseNota" aria-expanded="false" aria-controls="collapseOne" style="margin: 5px; width:100%;">
                        <i class="fa fa-receipt"></i> Nota
                    </button>
                    <div id="collapseNota" class="collapse">
                        <div class="card-body" style="padding: 10px auto;">
                            <!-- Pakai JQuery -->
                            <img src="" id="detailNotaDetail" class="rounded mx-auto d-block" alt="foto profil" style="max-width:400px; overflow: hidden;">
                            <a href="#" id="lihatNotaDetail" class="btn btn-sm btn-info btn-primary" style="margin-top: 1em;" target="_blank"><i class="fas fas fa-window-maximize"></i> Lihat Nota</a>
                            <a href="#" id="downloadNotaDetail" class="btn btn-sm btn-info btn-primary" style="margin-top: 1em;" download><i class="fas fas fa-download"></i> Download Nota</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- <input type="text" id="pembelianId" name="pembelianId" value="" /> -->
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT -->
<script type="text/javascript">
    //JS halaman aktif
    document.getElementById("pembelian-link").classList.add("active");
    document.getElementById("dropdown-aset").classList.add("active");
</script>

<script type="text/javascript">
    //document function
    $(document).ready(function() {
        //autonumeric 
        $('.harga').autoNumeric('init');
        $('#detailHarga').autoNumeric('init'); //autonumeric detailharga
        $('#detailTotal').autoNumeric('init'); //autonumeric detailtotal
        $('#updateTotalHarga').autoNumeric('init'); //autonumeric detailtotal
        //onchange select jenis aset, show opsi kategori
        $('#jenis_aset').change(function() {
            var jenis = $(this).val();
            if (jenis) {
                $.ajax({
                    type: "get",
                    url: "{{ route('home') }}/aset/kategori/get/" + jenis,
                    success: function(res) {
                        if (res) {
                            $("#id_kategori").empty();
                            $("#id_kategori").append('<option>Pilih Kategori</option>');
                            $.each(res, function(key, value) {
                                $("#id_kategori").append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    }
                });
            }
        });
        //JQuery Pencarian Berdasarkan Kriteria
        $('#table_id').DataTable({
            "scrollX": true,
            language: {
                search: "Cari di tabel:",
                zeroRecords: "Data tidak tersedia",
            },
            //kriteria column 0 nama tipe input
            initComplete: function() {
                this.api().columns([1]).every(function() {
                    var column = this;
                    var input = $('<input class="form-control select" placeholder="Filter Nama Barang" style="margin-bottom:10px;"></input>')
                        .appendTo($(".column-search"))
                        .on('keyup change clear', function() {
                            if (column.search() !== this.value) {
                                column
                                    .search(this.value)
                                    .draw();
                            }
                        });
                });
                //kriteria column 0 nama tipe select
                this.api().columns([2]).every(function() {
                    var column = this;
                    var select = $('<select class="form-control select" style="margin-bottom:10px;"><option value="">Filter Jenis Aset</option></select>')
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
                    var select = $('<select class="form-control select2" style="margin-bottom:10px; width:100%;"><option value="">Filter Kategori Aset</option></select>')
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
                this.api().columns([7]).every(function() {
                    var column = this;
                    var select = $('<select class="form-control select" style="margin-top:10px; width:100%;"><option value="">Filter Status Pembelian</option></select>')
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
                this.api().columns([8]).every(function() {
                    var column = this;
                    var select = $('<select class="form-control select" style="margin-top:10px; width:100%;"><option value="">Filter Status Inventaris</option></select>')
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
    });
</script>
<script type="text/javascript">
    function calc_total() {
        var hargasatuan = $("#updateHarga").val();
        var jumlah = $("#updateJumlah").val();
        $("#updateTotalHarga").val(jumlah * hargasatuan);
        $("#updateTotalHarga").autoNumeric('update', {
            aSign: 'Rp. '
        }); //autonumeric detailharga

    }

    function upload_nota_colorized() {
        //status aktif bold
        $("#detailUploadNota").css('font-weight', 'bold');
        //ganti warna status
        //sudah upload ubah warna hijau
        $("#detailUploadNota").filter(function() {
            return $(this).text() === 'Sudah Upload';
        }).css('color', 'green');
        //belum upload ubah ubah warna merah
        $("#detailUploadNota").filter(function() {
            return $(this).text() === 'Belum Upload';
        }).css('color', 'red');
    }

    function status_colorized() {
        //status aktif bold
        $(".font-status").css('font-weight', 'bold');

        //ganti warna status
        $(".font-status").filter(function() {
            return $(this).text() === 'Sudah Diterima';
        }).css('color', 'green');
        $(".font-status").filter(function() {
            return $(this).text() === 'Terdaftar';
        }).css('color', 'green');
        $(".font-status").filter(function() {
            return $(this).text() === 'Selesai';
        }).css('color', 'green');

        //status ubah warna merah
        $(".font-status").filter(function() {
            return $(this).text() === 'Gagal';
        }).css('color', 'red');
        $(".font-status").filter(function() {
            return $(this).text() === 'Tidak Terdaftar';
        }).css('color', 'red');
        $(".font-status").filter(function() {
            return $(this).text() === 'Belum Upload';
        }).css('color', 'red');

        //status ubah warna  kuning
        $(".font-status").filter(function() {
            return $(this).text() === 'Menunggu Barang Diterima';
        }).css('color', '#FFC300');

        //status ubah warna biru
        $(".font-status").filter(function() {
            return $(this).text() === 'Dalam Proses';
        }).css('color', 'blue');

    }

    function ValidateFileUpload2() {
        var fuData = document.getElementById('fileChooser2');
        var FileUploadPath = fuData.value;

        //To check if user upload any file
        if (FileUploadPath == '') {
            alert("Silakan pilih dan upload gambar");
        } else {
            var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

            //The file uploaded is an image

            if (Extension == "gif" || Extension == "png" || Extension == "bmp" ||
                Extension == "jpeg" || Extension == "jpg") {

                // To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }
            }

            //The file upload is NOT an image
            else {
                alert("Format foto yang diperbolehkan hanya GIF, PNG, JPG, JPEG dan BMP. ");
            }
        }
    }

    function ValidateFileUpload() {
        var fuData = document.getElementById('fileChooser');
        var FileUploadPath = fuData.value;

        //To check if user upload any file
        if (FileUploadPath == '') {
            alert("Silakan pilih dan upload gambar");
        } else {
            var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

            //The file uploaded is an image

            if (Extension == "gif" || Extension == "png" || Extension == "bmp" ||
                Extension == "jpeg" || Extension == "jpg") {

                // To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }
            }

            //The file upload is NOT an image
            else {
                alert("Format foto yang diperbolehkan hanya GIF, PNG, JPG, JPEG dan BMP. ");
            }
        }
    }
    // onclick btn delete, show modal
    $(document).on("click", ".open-delete", function() {
        /* passing data dari view button detail ke modal */
        var thisDataPembelian = $(this).data('id');
        $(".modal-footer #pembelianId").val(thisDataPembelian);
    });
    // onclick btn sudah dibeli, show modal
    $(document).on("click", ".open-sudahDibeli", function() {
        /* passing data dari view button detail ke modal */
        var thisDataPembelian = $(this).data('id');
        $(".modal-footer #pembelianId").val(thisDataPembelian);
    });
    // onclick btn sudah diterima, show modal
    $(document).on("click", ".open-sudahDiterima", function() {
        /* passing data dari view button detail ke modal */
        var thisDataPembelian = $(this).data('id');
        $(".modal-footer #pembelianId").val(thisDataPembelian);
    });

    // onclick btn update, show modal
    $(document).on("click", ".open-update", function() {
        /* passing data dari view button detail ke modal */
        var thisDataPembelian = $(this).data('id');
        $(".modal-footer #pembelianId").val(thisDataPembelian);
        var linkDetail = "{{ route('home') }}/aset/pembelian/detail/" + thisDataPembelian;
        $.get(linkDetail, function(data) {
            //deklarasi var obj JSON data detail anggota
            var obj = data;
            // ganti elemen pada dokumen html dengan hasil data json dari jquery
            $("#updateNama").val(obj.nama);
            $("#updateJumlah").val(obj.jumlah);
            $("#updateHarga").val(obj.harga);
            calc_total();
            $("#updatePenjual").val(obj.penjual);
            $("#updateTelpPenjual").val(obj.telp_penjual);
            var link_foto_nota = "{{ route('home') }}/" + obj.link_foto_nota;
            $('#detailNotaUpdate').attr('src', link_foto_nota);
            $('#downloadNotaUpdate').attr('href', link_foto_nota);
            $('#lihatNotaUpdate').attr('href', link_foto_nota);
        });
    });

    // onclick btn edit, show modal
    $(document).on("click", ".open-edit", function() {
        /* passing data dari view button detail ke modal */
        var thisDataPembelian = $(this).data('id');
        $(".modal-footer #pembelianId").val(thisDataPembelian);
        var linkDetail = "{{ route('home') }}/aset/pembelian/detail/" + thisDataPembelian;
        $.get(linkDetail, function(data) {
            //deklarasi var obj JSON data detail anggota
            var obj = data;
            var kategori = obj.kategori;
            var petugas = obj.petugas;
            // ganti elemen pada dokumen html dengan hasil data json dari jquery
            $("#editNama").val(obj.nama);
            $("#editJenis").val(obj.id_jenis);
            $("#editKategori").ready(function() {
                var jenis = $(editJenis).val();
                if (jenis) {
                    $.ajax({
                        type: "get",
                        url: "{{ route('home') }}/aset/kategori/get/" + jenis,
                        success: function(res) {
                            if (res) {
                                $.each(res, function(key, value) {
                                    $("#editKategori").append('<option value="' + key + '">' + value + '</option>');
                                });
                                $("#editKategori").val(kategori.id);
                            }
                        }
                    });
                }
            });
            $("#editJenis").change(function() {
                var jenis = $(editJenis).val();
                if (jenis) {
                    $.ajax({
                        type: "get",
                        url: "{{ route('home') }}/aset/kategori/get/" + jenis,
                        success: function(res) {
                            if (res) {
                                $("#editKategori").empty();
                                $("#editKategori").append('<option>Pilih Kategori</option>');
                                $.each(res, function(key, value) {
                                    $("#editKategori").append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        }
                    });
                }
            });
            $("#editJumlah").val(obj.jumlah);
            $("#editHarga").val(obj.harga);
            $("#editStatus").val(obj.status_pembelian);
            $("#editPetugas").val(petugas.id).trigger('change.select2');;
            // $('#editPetugas').select2('data', {id: petugas.id, text: petugas.nama});
            $("#editPenjual").val(obj.penjual);
            $("#editTelpPenjual").val(obj.telp_penjual);
        });
    });

    // onclick btn detail, show modal
    $(document).on("click", ".open-detail", function() {
        /* passing data dari view button detail ke modal */
        var thisDataPembelian = $(this).data('id');
        $(".modal-footer #pembelianId").val(thisDataPembelian);
        var linkDetail = "{{ route('home') }}/aset/pembelian/detail/" + thisDataPembelian;
        $.get(linkDetail, function(data) {
            //deklarasi var obj JSON data detail anggota
            var obj = data;
            //deklarasi variabel yang ada dalam objek
            var usulan = obj.usulan;
            if (usulan.jenis_usulan == "Katalog") {
                var katalog = usulan.katalog;
                var kategori = katalog.kategori;
            }
            var pengelola = obj.pengelola;
            var petugas = obj.petugas;
            // ganti elemen pada dokumen html dengan hasil data json dari jquery
            if (usulan.jenis_usulan == "Katalog") {
                $("#detailNama").html(katalog.nama);
                $("#detailKategori").html(kategori.nama);
            } else {
                $("#detailNama").html(usulan.nama);
                $("#detailKategori").html('-');
            }
            $("#detailNama").html(obj.nama);
            $("#detailKategori").html(kategori.nama);
            $("#detailJumlah").html(usulan.jumlah);
            $("#detailHarga").html(obj.harga_pembelian);
            $("#detailTotal").html(obj.harga_pembelian * usulan.jumlah);
            $("#dibuat").html(obj.dibuat);
            $("#diperbarui").html(obj.diperbarui);
            $("#detailPengelola").html(pengelola.nama);
            $("#detailPetugas").html(petugas.nama);
            $('#detailHarga').autoNumeric('update', {
                aSign: 'Rp. '
            }); //autonumeric detailharga
            $('#detailTotal').autoNumeric('update', {
                aSign: 'Rp. '
            });
            $("#detailPenjual").html(obj.penjual);
            if (obj.penjual == null) {
                $("#detailPenjual").html('-');
            } else {
                $("#detailPenjual").html(obj.penjual);
            }
            $("#detailTelpPenjual").html(obj.telp_penjual); //autonumeric detailtotal
            if (obj.telp_penjual == null) {
                $("#detailTelpPenjual").html('-');
            } else {
                $("#detailTelpPenjual").html(obj.telp_penjual);
            }
            $("#detailStatus").html(obj.status_pembelian);
            $("#detailUploadNota").html(obj.upload_nota);
            status_colorized();
            var link_foto_nota = "{{ route('home') }}/" + obj.link_foto_nota;
            $('#detailNotaDetail').attr('src', link_foto_nota);
            $('#downloadNotaDetail').attr('href', link_foto_nota);
            $('#lihatNotaDetail').attr('href', link_foto_nota);
        });
    });

    // $('#detailTotal').autoNumeric('init');
    $(document).ready(function() {
        //ganti ukuran show entry
        $(".custom-select").css('width', '82px');
        status_colorized();
    });
</script>
@include('layouts.footer')