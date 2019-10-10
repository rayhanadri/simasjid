@include('layouts.header')
@include('layouts.navbar')
<script type="text/javascript">
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
</script>
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
            <h1>Profile</h1>
            <div></div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-body" style="min-height: 300px; padding:0px;">
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
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td><?php echo $user->nama ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jabatan</th>
                                        <td><?php echo $user->jabatan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td><?php echo $user->status ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td><?php echo $user->email ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat</th>
                                        <td><?php echo $user->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telp/HP</th>
                                        <td><?php echo $user->telp ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="section-body" style="min-height: 300px">
                            <img src="<?php echo $user->link_foto ?>" id="blah" class="img-thumbnail rounded mx-auto d-block" alt="foto profil" style="width:250px; height:250px;overflow: hidden;"><br>
                            <br>
                            <form action="{{ route('uploadFotoProfile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Ganti Foto</label>
                                    <input type="file" required name="file" id="fileChooser" accept="image/*" class="form-control" onchange="return ValidateFileUpload()">
                                    <button type="submit" class="btn btn-primary">Upload Foto</button>
                                </div>
                            </form>
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
@include('layouts.footer')