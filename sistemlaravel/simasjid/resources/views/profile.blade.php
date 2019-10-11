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
      <div class="col-lg-8 col-md-6 col-sm-12">
        <div class="section-body" style="min-height: 300px; padding:0px;">
          <table class="table table-borderless" style="width:70%; margin: auto;">
            <tbody>
              <tr>
                <th scope="row">Nama</th>
                <td><?php echo $anggota->nama ?></td>
              </tr>
              <tr>
                <th scope="row">Jabatan</th>
                <td><?php echo $anggota->jabatan ?></td>
              </tr>
              <tr>
                <th scope="row">Status</th>
                <td class="font-status"><?php echo $anggota->status ?></td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td><?php echo $anggota->email ?></td>
              </tr>
              <tr>
                <th scope="row">Alamat</th>
                <td><?php echo $anggota->alamat ?></td>
              </tr>
              <tr>
                <th scope="row">Telp/HP</th>
                <td><?php echo $anggota->telp ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="section-body" style="min-height: 300px">
          <img src="{{$anggota->link_foto}}?=<?php echo filemtime($anggota->link_foto)?>" id="blah" class="img-thumbnail rounded mx-auto d-block" alt="foto profil" style="width:250px; height:250px;overflow: hidden;"><br>
          <br>
          <form action="{{ route('uploadFotoProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Ganti Foto</label>
              <input type="file" required name="file" id="fileChooser" accept="image/*" class="form-control" onchange="return ValidateFileUpload()">
              <button type="submit" class="btn btn-primary">Upload Foto</button>
              <br><br>Jika foto belum terganti setelah klik upload foto, silakan tunggu beberapa menit untuk browser melakukan refresh.
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  $(document).ready(function() {
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