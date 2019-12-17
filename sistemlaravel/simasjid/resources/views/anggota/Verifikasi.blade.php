@include('layouts.header')
@include('layouts.navbar')
<?php
/* PHP UNTUK PENGATURAN VIEW */
//anggota terautentikasi
$authUser = Auth::user();
//hide untuk selain sekretaris dan ketua
$sekretaris = array(1, 2);
$inside_sekretaris = in_array($authUser->id_jabatan, $sekretaris);
?>

<div class="main-content">
    <section class="section">
        <div class="row">
            <div>
                <ol class="breadcrumb float-sm-left" style="margin-bottom: 10px; margin-left: 15px;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-mosque"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('anggotaDasbor') }}">Keanggotaan</a></li>
                    <li class="breadcrumb-item active">Verifikasi</li>
                </ol>
            </div>
        </div>
        <div class="section-header">
            <h1><i class="fa fa-check-square"></i> Verifikasi Anggota</h1>
            <div></div>
        </div>
        <div class="row" style="padding-top: 10px;">
            <div class="col-lg-8">
                <div class="section-body" style="min-height: 300px; padding:20px;">
                    <table id="table_id" class="table table-striped table-bordered" style="padding-bottom:20px;">
                        <thead>
                            <tr>
                                <th class="dt-center">Nama</th>
                                <th class="dt-center">Jabatan</th>
                                <th class="dt-center">Status</th>
                                <th class="dt-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggotaGroup as $anggota)
                            <tr>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->jabatan }}</td>
                                <td class="font-status">{!!$anggota->status!!}</td>
                                <td class="dt-center">

                                    <!-- <button class="open-detail btn btn-sm" data-toggle="modal" data-id="{{ $anggota->id }}" data-target="#detailModal">Detail</button>
                                    | <button class="open-detail btn btn-sm" data-toggle="modal" data-id="{{ $anggota->id }}" data-target="#detailModal">Detail</button> -->
                                    <div class="btn-group mb-3" role="group" aria-label="Basic example" style="padding-left: 20px;">
                                        <a href="#" class="open-detail btn btn-icon btn-sm btn-info" data-toggle="modal" data-id="{{ $anggota->id }}" data-target="#detailModal"><i class="fas fa-id-badge"></i> Detail</a>
                                        <a href="#" class="open-tolak btn btn-icon btn-sm btn-danger" data-toggle="modal" data-id="{{ $anggota->id }}" data-target="#tolakModal"><i class="fas fa-times"></i></i> Tolak</a>
                                        <a href="#" class="open-terima btn btn-icon btn-sm btn-primary" data-toggle="modal" data-id="{{ $anggota->id }}" data-target="#terimaModal"><i class="fas fa-check"></i> Terima</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-body" style="padding:20px;">
                    <h6><i class="fa fa-filter"></i> Filter Data</h6>
                    <!-- Pakai JQuery -->
                    <div class="column-search"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Detail -->
    <div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
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
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tolak -->
    <div class="modal fade" tabindex="-1" role="dialog" id="tolakModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tolak Verifikasi Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ route('home') }}/public/dist/assets/img/svg/cancel.svg" id="detailFoto" class="mx-auto d-block" alt="tolak image" style="width:150px; height:150px;overflow: hidden;">

                    <h5 align="center">Apakah Anda yakin ingin menolak verifikasi anggota ini?</h5>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="{{ route('anggotaTolakVerif') }}" method="post">
                        @csrf
                        <input type="text" id="id_tolak" name="id" value="" hidden />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Batalkan</button>
                        <input type="submit" value="Ya, Tolak" class="btn btn-danger" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Verif -->
    <div class="modal fade" tabindex="-1" role="dialog" id="terimaModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verifikasi Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ route('home') }}/public/dist/assets/img/svg/checked.svg" id="detailFoto" class="mx-auto d-block" alt="verif image" style="width:150px; height:150px;overflow: hidden;">
                    <h5 align="center">Apakah Anda yakin ingin verifikasi anggota ini?</h5>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="{{ route('anggotaTerimaVerif') }}" method="post">
                        @csrf
                        <input type="text" id="id_terima" name="id" value="" hidden />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Batalkan</button>
                        <input type="submit" value="Ya, Verifikasi" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT -->
<script type="text/javascript">
    //JS halaman aktif
    document.getElementById("verifikasi-link").classList.add("active");
    document.getElementById("dropdown-keanggotaan").classList.add("active");
</script>

<script type="text/javascript">
    //JQuery Pencarian Berdasarkan Kriteria
    $(document).ready(function() {
        $('#table_id').DataTable({
            //kriteria column 0 nama tipe input
            initComplete: function() {
                this.api().columns([0]).every(function() {
                    var column = this;
                    var input = $('<input class="form-control select" placeholder="Nama..." style="margin-bottom:10px;"></input>')
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
                this.api().columns([1]).every(function() {
                    var column = this;
                    var select = $('<select class="form-control select" style="margin-bottom:10px;"><option value="">Jabatan...</option></select>')
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
                    var select = $('<select class="form-control select" style="margin-bottom:10px;"><option value="">Status...</option></select>')
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
    // onclick tolak, show modal
    $(document).on("click", ".open-tolak", function() {
        /* passing data dari view button detail ke modal */
        var thisDataAnggota = $(this).data('id_tolak');
        $(".modal-footer #id").val(thisDataAnggota);
    });
    // onclick verif, show modal
    $(document).on("click", ".open-terima", function() {
        /* passing data dari view button detail ke modal */
        var thisDataAnggota = $(this).data('id_terima');
        $(".modal-footer #id").val(thisDataAnggota);
    });
    // onclick pada detail, show modal
    $(document).on("click", ".open-detail", function() {
        /* passing data dari view button detail ke modal */
        var thisDataAnggota = $(this).data('id');
        // $(".modal-body #id").val(thisDataAnggota);
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

            status_colorized();
        });
    });
    $(document).ready(function() {
        //ganti ukuran show entry
        $(".custom-select").css('width', '82px');

        status_colorized();
    });

    function status_colorized() {
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
    }
</script>
@include('layouts.footer')