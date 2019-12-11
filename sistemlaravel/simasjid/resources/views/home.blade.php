@include('layouts.header')
@include('layouts.navbar')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div>
        <ol class="breadcrumb float-sm-left" style="margin-bottom: 10px; margin-left: 15px;">
          <li class="breadcrumb-item active"><a href="{{ route('home') }}"><i class="fas fa-mosque"></i> Home</a></li>
        </ol>
      </div>
    </div>
    <div class="section-header">
      <h1>Home</h1>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0px;">
      <div class="card" style="margin-bottom: 10px;">
        <div style="text-align:center; padding:20px;">
          <h3>Selamat datang di Sistem Informasi Masjid Ibnu Sina!</h3>
        </div>
      </div>
    </div>
    <!-- row 1 -->
    <div class="row col-lg-12">
      <div class="row col-lg-12">
        <div class="col-lg-4 col-md-4 col-sm-4" style="margin:auto;">
          <div class="card" style="height:200px;">
            <div style="padding:30px; text-align:center;">
              <a href="#"><i class="fa fa-users fa-7x"></i>
                <br><br>
                <h4>Keanggotaan</h4>
              </a>
              <br>
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-4 col-md-4 col-sm-4" style="margin:auto;">
          <div class="card" style="height:200px;">
            <div style="padding:30px; text-align:center;">
              <a href="#"><i class="fa fa-edit fa-7x"></i>
                <br><br>
                <h4>Notulensi</h4>
              </a>
              <br>
            </div>
          </div>
        </div> -->
        <div class="col-lg-4 col-md-4 col-sm-4" style="margin:auto;">
          <div class="card" style="height:200px;">
            <div style="padding:30px; text-align:center;">
              <a href="#"><i class="fa fa-warehouse fa-7x"></i>
                <br><br>
                <h4>Manajemen Aset</h4>
              </a>
              <br>
            </div>
          </div>
        </div>
      </div>
      <!-- row 2 -->
      <!-- <div class="row col-lg-12">
      <div class="col-lg-4 col-md-4 col-sm-4" style="margin:auto;">
        <div class="card" style="height:200px;">
          <div style="text-align:center;">
            <a href="#"><i class="icofont-cow" style="font-size: 150px;"></i>
              <h4>Qurban</h4>
            </a>
            <br>
          </div>
        </div>
      </div>
    </div> -->
  </section>


  <br>
</div>
<script type="text/javascript">
  document.getElementById("home-link").classList.add("active");
</script>
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