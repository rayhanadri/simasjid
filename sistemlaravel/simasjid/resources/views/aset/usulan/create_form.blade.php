@include('layouts.header')
@include('layouts.navbar')
<!-- Main Content -->
<!-- <script type="text/javascript" src="{{asset('public/dist/assets/js/page/bootstrap-modal.js')}}"></script> -->
<?php

use Carbon\Carbon;

Carbon::setLocale('id');
//hide untuk selain sekretaris dan ketua
?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div>
                <ol class="breadcrumb float-sm-left" style="margin-bottom: 10px; margin-left: 15px;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-mosque"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('asetDasbor') }}">Manajemen Aset</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('usulanTerdaftar') }}">Usulan</a></li>
                    <li class="breadcrumb-item">Buat Usulan</li>
                </ol>
            </div>
        </div>
        <div class="section-header" style="margin-bottom: 0px;">
            <div style="margin: auto;">
                <h1>Buat Usulan Baru</h1>
            </div>
        </div>
        <div class="section-body" style="margin-bottom: 0px;">
            <div style="text-align:right;">

                <a href="#" class="btn btn-icon btn-sm btn-primary" data-toggle="modal" data-id="#" data-target="#updateModal" style="margin-bottom: 2px; width: 10em;"><i class="fas fa-sync"></i> Update Status</a>
                <a href="#" class="open-edit btn btn-icon btn-sm btn-warning" data-toggle="modal" data-id="#" data-target="#editModal" style="margin-bottom: 2px; width: 7em;"><i class="fas fa-edit"></i> Edit</a>
                <a href="#" class="open-delete btn btn-icon btn-sm btn-danger" data-toggle="modal" data-id="#" data-target="#deleteModal" style="margin-bottom: 2px; width: 7em;"><i class="fas fa-trash"></i> Hapus</a>
                <a href="#" class="btn btn-icon btn-sm btn-primary" data-toggle="modal" data-id="#" data-target="#buatPembelianModal" style="margin-bottom: 2px; width: 12em;"><i class="fas fa-shopping-bag"></i> Buat Pembelian</a>
                <a href="#" class="open-edit btn btn-icon btn-sm btn-secondary" data-toggle="modal" data-id="#" data-target="#editModal" style="margin-bottom: 2px; width: 12em;"><i class="fas fa-shopping-bag"></i> Lihat Pembelian</a>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="section-body">
                    <div class="col-12">
                        <form action="{{ route('usulanCreate') }}" method="post">
                            @csrf
                            <table border="1px" style="width:70%; margin: auto;">
                                <tr>
                                    <th scope="row" style="text-align:center;">Diusulkan oleh</th>
                                    <td style="text-align:center;">{{ Auth::user()->nama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align:center;">Nama Usulan</th>
                                    <td>
                                        <input type="text" style="width: 100%;" name="nama_usulan" placeholder="Nama Usulan" required />
                                        <input type="text" name="id_pembuat" value="{{ Auth::user()->id }}" hidden/>
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <!--  -->
                            <div style="text-align:center;">
                                <h5>Daftar Barang Usulan</h5>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field" style="width:70%; margin: auto;">
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                    <tr>
                                        <td><input type="text" name="nama_barang[]" placeholder="Nama Barang" class="form-control name_list" required /></td>
                                        <td><input type="number" name="jml_barang[]" placeholder="Jumlah Barang" class="form-control" required /></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</button></td>
                                    </tr>
                                </table>
                            </div>
                            <div style="text-align:center;">
                                <input type="submit" class="btn btn-primary" value="Buat Usulan">
                            </div>
                        </form>
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
                    <form action="#" method="post">
                        @csrf
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
            <form method="POST" action="#">
                <input id="id" type="text" name="id" value="#" readonly hidden>
                <input id="id_pengelola" type="text" name="id_pengelola" value="#" readonly hidden>
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
            <form method="POST" action="#">
                @csrf
                <input id="id_pengelola" type="text" class="form-control" name="id_pengelola" value="#" readonly hidden>
                <input id="id" type="text" class="form-control" name="id" value="#" readonly hidden>
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

                                <tr>
                                    <th scope="row">Harga Satuan</th>
                                    <td><input type="number" id="harga" name="harga" class="form-control" value="#" required></td>
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
                <input id="id_pengelola" type="text" class="form-control" name="id_pengelola" value="#" readonly hidden>
                <input id="id_usulan" type="text" class="form-control" name="id_usulan" value="#" readonly hidden>
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
        var i = 1;

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="nama_barang[]" placeholder="Nama Barang" class="form-control name_list" required/></td><td><input type="number" name="jml_barang[]" placeholder="Jumlah Barang" class="form-control" required /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fas fa-times"></i> Hapus</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });


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