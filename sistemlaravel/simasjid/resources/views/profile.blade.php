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
      <div class="col-lg-9 col-md-6 col-sm-12">
        <div class="section-body" style="min-height: 300px; padding:40px;">
          <?php
          // echo 'ini Profile' . '<br>';
          // // echo $token;
          echo 'Nama: ' . $user->nama;
          echo '<br>Jabatan: ' . $user->id_jabatan;
          echo '<br>Email: ' . $user->email;
          echo '<br>Alamat: ' . $user->alamat;
          echo '<br>Telepon/HP: ' . $user->telp;
          ?>

          <br><br>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="section-body" style="min-height: 300px">
          <img src="public/dist/assets/img/avatar/avatar-1.png" class="img-thumbnail rounded mx-auto d-block" alt="..." style="width:200px; height:200px;overflow: hidden;">
        </div>
      </div>
    </div>


  </section>
</div>


</div>

@include('layouts.footer')