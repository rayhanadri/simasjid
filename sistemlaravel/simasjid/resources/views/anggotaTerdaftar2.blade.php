@include('layouts.header')
@include('layouts.navbar')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo URL::to('/').'/'.'public/plugins/jquery/jquery.min.js'; ?></h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-body" style="min-height: 300px; padding:10px;">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 4.0
                                </td>
                                <td>Win 95+</td>
                                <td> 4</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td>5</td>
                                <td>C</td>
                            </tr>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.5
                                </td>
                                <td>Win 95+</td>
                                <td>5.5</td>
                                <td>A</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- jQuery -->
<script src="<?php echo URL::to('/').'/'.'public/plugins/jquery/jquery.min.js'; ?>"></script>
<!-- DataTables -->
<script src="<?php echo URL::to('/').'/'.'public/plugins/datatables/jquery.dataTables.js'; ?>"></script>
<script src="<?php echo URL::to('/').'/'.'public/plugins/datatables-bs4/js/dataTables.bootstrap4.js'; ?>"></script>

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
</body>

</html>