@include('layouts.header')
@include('layouts.navbar')
<style>
    table {
        table-layout: fixed;
        width: 100%;
    }

    table {
        padding: 0 15px;
        width: 100%;
    }

    .table:not(.table-sm):not(.table-md):not(.dataTable) th {
        padding: 0 15px;
        height: 60px;
        vertical-align: middle;
    }

    .table:not(.table-sm):not(.table-md):not(.dataTable) td,
    .table:not(.table-sm):not(.table-md):not(.dataTable) th {
        padding: 0 15px;
        height: 60px;
        vertical-align: middle;
    }
</style>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Anggota Terdaftar</h1>
            <div></div>
        </div>
        <div class="row" style="
    margin-left: 0px;
    margin-right: 0px;
">
            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left: 0px; padding-right: 0px;">
                <div class="section-body" style="min-height: 300px; padding:0px;">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-body" style="min-height: 300px; padding:10px;">
                            <table id="example1" class="table table-bordered table-striped" style="padding-left: 0px; padding-right: 0px; style=" overflow-x:hidden;"">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Telp/HP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($list_anggota as $anggota) { ?>
                                    <tr>
                                        <td>{{ $anggota->id }}</td>
                                        <td>{{ $anggota->username }}</td>
                                        <td>{{ $anggota->jabatan }}</td>
                                        <td>{!! $anggota->status !!}</td>
                                        <td>{{ $anggota->nama }}</td>
                                        <td>{{ $anggota->email }}</td>
                                        <td>{{ $anggota->alamat }}</td>
                                        <td>{{ $anggota->telp }}</td>
                                    </tr>
                                    <?php } ?>
                            </table>
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
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
<script>
  document.getElementById("terdaftar-link").classList.add("active");
  document.getElementById("dropdown-keanggotaan").classList.add("active");
</script>
@include('layouts.footer')