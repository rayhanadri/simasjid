@include('layouts.header')
@include('layouts.navbar')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div></div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-6 col-sm-12">
        <div class="section-body" style="min-height: 300px; padding:40px;">
          <?php
          // echo 'ini Profile' . '<br>';
          // // echo $token;
          echo 'Nama: ' . $user->nama;
          echo '<br>Jabatan: ' . $user->jabatan;
          echo '<br>Email: ' . $user->email;
          echo '<br>Alamat: ' . $user->alamat;
          echo '<br>Telepon/HP: ' . $user->telp;
          echo '<br>Telepon/HP: ' . $user->link_foto;
          ?>
          <br><br>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="section-body" style="min-height: 300px">
          <img src="<?php echo $user->link_foto ?>" id="blah" class="img-thumbnail rounded mx-auto d-block" alt="..." style="width:200px; height:200px;overflow: hidden;"><br>
          <br>
          <form>
            <div class="form-group">
              <label>Ganti Foto</label>
              <input type="file" id="fileChooser" accept="image/*" class="form-control" onchange="return ValidateFileUpload()">
              <button type="submit" class="btn btn-primary">Upload Foto</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script type = "text/javascript">
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

@include('layouts.footer')