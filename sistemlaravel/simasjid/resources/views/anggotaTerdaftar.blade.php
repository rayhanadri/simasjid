@include('layouts.header')
@include('layouts.navbar')
<!-- Main Content -->
<!-- <script type="text/javascript" src="{{asset('public/dist/assets/js/page/bootstrap-modal.js')}}"></script> -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Anggota Terdaftar</h1>
            <div></div>
        </div>
        <div class="row" style="padding-top: 10px;">
            <div class="col-lg-8">
                <div class="section-body" style="min-height: 300px; padding:20px;">
                    <table id="table_id" class="table table-striped table-bordered" style="padding-bottom:20px;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Action</th>
                                <!-- <th>Email</th>
                                <th>Alamat</th>
                                <th>Telp/HP</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_anggota as $anggota_dalam_list)
                            <tr>
                                <td>{{ $anggota_dalam_list->nama }}</td>
                                <td>{{ $anggota_dalam_list->jabatan }}</td>
                                <!-- <td>{{ $anggota->username }}</td> -->
                                <td class="font-status">{!!$anggota_dalam_list->status!!}</td>
                                <td><button class="open-detail btn btn-primary" data-toggle="modal" data-id="{{ $anggota_dalam_list->id }}" data-target="#detailModal">Detail</button></td>
                                <!-- <td>{{ $anggota->email }}</td>
                                    <td>{{ $anggota->alamat }}</td>
                                    <td>{{ $anggota->telp }}</td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-body" style="min-height: 300px; padding:20px;">
                    <h6>Cari Berdasarkan Kriteria</h6>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                <td id="detailStatus"></td>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- SCRIPT -->
<script type="text/javascript">
    //JS halaman aktif
    document.getElementById("terdaftar-link").classList.add("active");
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
    // onclick pada detail, show modal
    $(document).on("click", ".open-detail", function() {
        /* passing data dari view button detail ke modal */
        var thisDataAnggota = $(this).data('id');
        // $(".modal-body #anggotaId").val(thisDataAnggota);
        var linkDetail = "{{ route('home') }}/anggota/detail/" + thisDataAnggota;
        $.get(linkDetail, function(data) {
            var obj = data;
            // $(".modal-body p").append(JSON.stringify(data));
            document.getElementById("detailNama").innerHTML = obj.nama;
            document.getElementById("detailJabatan").innerHTML = obj.jabatan;
            document.getElementById("detailStatus").innerHTML = obj.status;
            document.getElementById("detailEmail").innerHTML = obj.email;
            document.getElementById("detailAlamat").innerHTML = obj.alamat;
            document.getElementById("detailTelp").innerHTML = obj.telp;
            document.getElementById("detailFoto").src = obj.link_foto;
            // console.log(data);
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