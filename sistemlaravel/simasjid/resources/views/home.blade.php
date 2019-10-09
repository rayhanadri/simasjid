@include('layouts.header')
@include('layouts.navbar')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Blank Page</h1>
      <div></div>

    </div>

    <div class="section-body">
      <?php
      echo 'ini Home' . '<br>';
      // echo $token;
      echo '<br>';
      echo '<br>';
      echo 'detail pengguna';
      echo '<br>nama: '.Auth::user()->nama;
      echo '<br>jabatan: ';
      switch (Auth::user()->id_jabatan) {
        case 1:
          echo "Ketua";
          break;
          case 2:
          echo "Sekretaris";
          break;
          case 3:
          echo "Bendahara";
          break;
          case 4:
          echo "Takmir";
          break;
        default:
          echo "lain-lain";
          break;
      }
      echo '<br>email: '.Auth::user()->email;
      echo '<br>email: '.Auth::user()->email;
      //data anggota dari array result
      // echo $idAnggota = $result['data_anggota']['idAnggota'];
      // echo $idJabatanAnggota = $result['data_anggota']['idJabatanAnggota'];
      // echo $namaAnggota = $result['data_anggota']['namaAnggota'];
      // echo $username = $result['data_anggota']['username'];
      ?>
      <br><br>
      <select class="form-control select2" style="width: 100%">
        <option>Option 1</option>
        <option>Option 2</option>
        <option>Option 3</option>
      </select>

      <div class="form-group">
        <label>Date Picker</label>
        <input type="text" class="form-control datepicker">
      </div>
      <div class="form-group">
        <label>Date Time Picker</label>
        <input type="text" class="form-control datetimepicker">
      </div>
      <div class="form-group">
        <label>Time Picker</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-clock"></i>
            </div>
          </div>
          <input type="text" class="form-control timepicker">
        </div>
      </div>
    </div>
  </section>
</div>

@include('layouts.footer')