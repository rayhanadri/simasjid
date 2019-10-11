@include('layouts.header')
@include('layouts.navbar')
<style>

</style>
<!-- Main Content -->
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
                            @foreach ($list_anggota as $anggota)
                            <tr>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->jabatan }}</td>
                                <!-- <td>{{ $anggota->username }}</td> -->
                                <td class="font-status">{!!$anggota->status!!}</td>
                                <td><button type="submit" class="btn btn-primary">Detail</button></td>
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
</div>
<!-- jQuery -->
<script src="<?php echo URL::to('/') . '/' . 'public/plugins/jquery/jquery.min.js'; ?>"></script>
<!-- DataTables -->
<script src="<?php echo URL::to('/') . '/' . 'public/plugins/datatables/jquery.dataTables.js'; ?>"></script>
<script src="<?php echo URL::to('/') . '/' . 'public/plugins/datatables-bs4/js/dataTables.bootstrap4.js'; ?>"></script>

<!-- page script -->
<script>
    //JS halaman aktif
    document.getElementById("terdaftar-link").classList.add("active");
    document.getElementById("dropdown-keanggotaan").classList.add("active");
</script>

<script>
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
<script>
    $(document).ready(function() {
        //perlebar kotak show entries
        $(".custom-select").css('width', '82px');
        //status aktif bold
        $(".font-status").css('font-weight', 'bold');
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
        }).css('color', 'grey');
    });
</script>
@include('layouts.footer')