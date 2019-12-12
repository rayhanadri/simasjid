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
                    <li class="breadcrumb-item"><a href="{{ route('asetDasbor') }}">Manajemen Aset</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('usulanTerdaftar') }}">Usulan</a></li>
                    <li class="breadcrumb-item active">{{ $detail_usulan->id }}</li>
                </ol>
            </div>
        </div>
        <div class="section-header" style="margin-bottom: 0px;">
            <div style="margin: auto;">
                <h1>Detail Usulan</h1>
            </div>
        </div>
        <div class="section-body" style="margin-bottom: 0px;">
            <div style="text-align:right;">
                @if($inside_pengelola)
                @if( $detail_usulan->status_usulan == "Menunggu Keputusan" )
                <a href="#" class="btn btn-icon btn-sm btn-primary" data-toggle="modal" data-id="#" data-target="#updateModal" style="margin-bottom: 2px; width: 10em;"><i class="fas fa-sync"></i> Update Status</a>
                <a href="#" class="open-edit btn btn-icon btn-sm btn-warning" data-toggle="modal" data-id="#" data-target="#editModal" style="margin-bottom: 2px; width: 7em;"><i class="fas fa-edit"></i> Edit</a>
                <a href="#" class="open-delete btn btn-icon btn-sm btn-danger" data-toggle="modal" data-id="#" data-target="#deleteModal" style="margin-bottom: 2px; width: 7em;"><i class="fas fa-trash"></i> Hapus</a>
                @endif
                @if( $detail_usulan->status_usulan == "Disetujui" && empty($detail_usulan->pembelian) )
                <a href="#" class="btn btn-icon btn-sm btn-primary" data-toggle="modal" data-id="#" data-target="#buatPembelianModal" style="margin-bottom: 2px; width: 12em;"><i class="fas fa-shopping-bag"></i> Buat Pembelian</a>
                @endif
                @if ( !empty($detail_usulan->pembelian) )
                <a href="#" class="open-edit btn btn-icon btn-sm btn-secondary" data-toggle="modal" data-id="#" data-target="#editModal" style="margin-bottom: 2px; width: 12em;"><i class="fas fa-shopping-bag"></i> Lihat Pembelian</a>
                @endif
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="section-body">
                    <div class="col-12">
                        <table border="1" style="width:70%; margin: auto;">
                            <tr>
                                <th scope="row" style="text-align:center;">Diusulkan oleh</th>
                                <td style="text-align:center;">{{ $detail_usulan->pengusul->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Dibuat</th>
                                <td style="text-align:center;">{{ $detail_usulan->dibuat }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Diupdate oleh</th>
                                @if( $detail_usulan->pengelola == null )
                                <td style="text-align:center;">-</td>
                                @else
                                <td style="text-align:center;">{{ $detail_usulan->pengelola->nama }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Terakhir update</th>
                                <td style="text-align:center;">{{ $detail_usulan->diperbarui }}</td>
                            </tr>
                        </table>
                        <br />
                        <table border="1" style="width:70%; margin: auto;">
                            <tr>
                                <th scope="row" style="text-align:center;">ID</th>
                                <td style="text-align:center;">{{ $detail_usulan->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Jenis Usulan</th>
                                <td style="text-align:center;"> {{ $detail_usulan->jenis_usulan }} </td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Kategori Barang</th>
                                <td style="text-align:center;">
                                    @if($detail_usulan->jenis_usulan == "Katalog")
                                    {{ $detail_usulan->katalog->kategori->nama }}
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Nama Barang</th>
                                <td style="text-align:center;">
                                    @if($detail_usulan->jenis_usulan == "Katalog")
                                    {{ $detail_usulan->katalog->nama }}
                                    @else
                                    {{ $detail_usulan->nama }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Jumlah</th>
                                <td style="text-align:center;">{{ $detail_usulan->jumlah }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Harga Satuan</th>
                                <td style="min-width: 7em; text-align:center;" class="harga" data-a-sign="Rp. " data-a-dec="," data-a-sep=".">{{ $detail_usulan->harga_usulan }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Harga Total</th>
                                <td style="min-width: 7em; text-align:center;" class="harga" data-a-sign="Rp. " data-a-dec="," data-a-sep=".">{{ $detail_usulan->harga_usulan * $detail_usulan->jumlah }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Keterangan</th>
                                <td style="text-align:center;">{{ $detail_usulan->keterangan }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Status Usulan</th>
                                <td class="font-status" style="text-align:center;">{{ $detail_usulan->status_usulan }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center;">Status Pembelian</th>
                                @if(!empty($detail_usulan->pembelian))
                                <td class="font-status" style="text-align:center;">{{ $detail_usulan->pembelian->status_pembelian }}</td>
                                @else
                                <td class="font-status" style="text-align:center;">Tidak Terdaftar</td>
                                @endif
                            </tr>
                        </table>
                        <hr />

                    </div>
                </div>
            </div>
    </section>
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

                    <h5 align="center">Apakah Anda yakin ingin menghapus usulan ini?</h5>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="{{ route('usulanDelete') }}" method="post">
                        @csrf
                        <input type="text" id="id" name="id" value="{{ $detail_usulan->id }}" readonly hidden />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Batalkan</button>
                        <input type="submit" value="Ya, Hapus" class="btn btn-danger" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Update -->
    <div class="modal fade" tabindex="-1" role="dialog" id="updateModal">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('usulanUpdate') }}">
                <input id="id" type="text" name="id" value="{{$detail_usulan->id}}" readonly hidden>
                <input id="id_pengelola" type="text" name="id_pengelola" value="{{$anggota->id}}" readonly hidden>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Status Usulan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width:90%; margin: auto;">
                            <tbody>
                                <tr>
                                    <th scope="row">Keputusan</th>
                                    <td><select id="status_usulan" name="status_usulan" class="form-control select">
                                            <option value="Disetujui">Disetujui</option>
                                            <option value="Ditolak">Ditolak</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <input type="text" id="usulanId" name="usulanId" value="" hidden />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <input type="submit" value="Konfirmasi Update Status" class="btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('usulanEdit') }}">
                @csrf
                <input id="id_pengelola" type="text" class="form-control" name="id_pengelola" value="{{ $anggota->id }}" readonly hidden>
                <input id="id" type="text" class="form-control" name="id" value="{{ $detail_usulan->id }}" readonly hidden>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Usulan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width:90%; margin: auto;">
                            <tbody>
                                @if( $detail_usulan->jenis_usulan == "Non-Katalog" )
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td><input type="text" id="nama" name="nama" class="form-control" value="{{ $detail_usulan->nama }}" required></td>
                                </tr>
                                @endif
                                <tr>
                                    <th scope="row">Jumlah</th>
                                    <td><input type="number" id="jumlah" name="jumlah" class="form-control" value="{{ $detail_usulan->jumlah }}" required></td>
                                </tr>
                                <tr>
                                    <th scope="row">Harga Satuan</th>
                                    <td><input type="number" id="harga" name="harga" class="form-control" value="{{ $detail_usulan->harga_usulan }}" required></td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Harga</th>
                                    <td><input type="text" id="totalHarga" name="totalHarga" class="form-control" required readonly disabled></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <input type="text" id="usulanId" name="usulanId" value="" hidden />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <input type="submit" value="Konfirmasi Edit Usulan" class="btn btn-warning" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Buat Pembelian -->
    <div class="modal fade" tabindex="-1" role="dialog" id="buatPembelianModal">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('pembelianCreate') }}">
                @csrf
                <input id="id_pengelola" type="text" class="form-control" name="id_pengelola" value="{{ $anggota->id }}" readonly hidden>
                <input id="id_usulan" type="text" class="form-control" name="id_usulan" value="{{ $detail_usulan->id }}" readonly hidden>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Buat Pembelian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table style="width:90%; margin: auto;">
                            <tbody>
                                <tr>
                                    <th scope="row">Pilih Petugas Pembelian</th>
                                    <td>
                                        <select name="id_petugas" class="form-control select2" style="width: 100%;" required>
                                            @foreach($list_anggota as $anggota_terpilih)
                                            <option value="{{ $anggota_terpilih->id }}">{{ $anggota_terpilih->nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Keterangan</th>
                                    <td><textarea id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <input type="submit" value="Konfirmasi Buat Pembelian" class="btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- SCRIPT -->
<script type="text/javascript">
    //JS halaman aktif
    document.getElementById("usulan-link").classList.add("active");
    document.getElementById("dropdown-aset").classList.add("active");

    function status_colorized() {
        //status aktif bold
        $(".font-status").css('font-weight', 'bold');
        //ganti warna status
        $(".font-status").filter(function() {
            return $(this).text() === 'Pembelian Gagal';
        }).css('color', 'red');
        $(".font-status").filter(function() {
            return $(this).text() === 'Tidak Terdaftar';
        }).css('color', 'red');

        //warna biru
        $(".font-status").filter(function() {
            return $(this).text() === 'Dalam Proses';
        }).css('color', 'blue');

        //warna hijau
        $(".font-status").filter(function() {
            return $(this).text() === 'Disetujui';
        }).css('color', 'green');
        $(".font-status").filter(function() {
            return $(this).text() === 'Selesai';
        }).css('color', 'green');

        //warna merah
        $(".font-status").filter(function() {
            return $(this).text() === 'Ditolak';
        }).css('color', 'red');
        $(".font-status").filter(function() {
            return $(this).text() === 'Gagal';
        }).css('color', 'red');

        //status kuning
        $(".font-status").filter(function() {
            return $(this).text() === 'Menunggu Keputusan';
        }).css('color', '#FFC300');
        $(".font-status").filter(function() {
            return $(this).text() === 'Menunggu Barang Diterima';
        }).css('color', '#FFC300');

    }

    //document function
    $(document).ready(function() {
        $(".custom-select").css('width', '82px');
        status_colorized();
        //autonumeric 
        $('#totalHarga').autoNumeric('init'); //harga
        $('.harga').autoNumeric('init'); //class harga
    });

    // onclick btn edit, show modal
    $(document).on("click", ".open-edit", function() {
        $("#totalHarga").ready(function() {
            var harga = $("#harga").val();
            var jumlah = $("#jumlah").val();
            $("#totalHarga").val(harga * jumlah);
            $("#totalHarga").autoNumeric('update', {
                aSign: 'Rp. '
            });
        });
        $("#harga").change(function() {
            var harga = $("#harga").val();
            var jumlah = $("#jumlah").val();
            $("#totalHarga").val(harga * jumlah);
            $("#totalHarga").autoNumeric('update', {
                aSign: 'Rp. '
            });
        });
        $("#jumlah").change(function() {
            var harga = $("#harga").val();
            var jumlah = $("#jumlah").val();
            $("#totalHarga").val(harga * jumlah);
            $("#totalHarga").autoNumeric('update', {
                aSign: 'Rp. '
            });
        });
    });
</script>
@include('layouts.footer')