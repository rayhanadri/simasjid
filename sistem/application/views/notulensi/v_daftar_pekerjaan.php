        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                                <h4>Daftar Pekerjaan</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="display:none">idNotulen</th>
                                                <th>Pekerjaan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Progres terakhir</th>
                                                <th>Verifikasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $count = 1;
                                                foreach ($proyeks as $proyek): ?>
                                                <tr>
                                                    <td style="display:none"><?php echo $proyek->id ?></td>
                                                    <td><?php echo $proyek->nama_proyek ?></td>
                                                    <td><?php echo $proyek->nama_anggota ?></td>
                                                    <td><span class="label label-warning">Proses</span> <br>Melakukan perbaikan tv </td>
                                                    <td>
                                                        <div class="alert alert-danger">
                                                        Belum Verifikasi Ketua Takmir  <br><a href="#" class="alert-link"><i class="fa fa-check-square-o"></i>Verifikasi Sekarang</a>
                                                        </div>
                                                    </td>
                                                    <td><a href="<?php echo base_url('pekerjaan/'.$proyek->id_proyek); ?>"><button type="button" class="btn btn-info m-b-10 m-l-5">Lihat</button></a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            
                                            <tr>
                                                <td style="display:none">Tiger Nixon</td>
                                                <td>24/03/2019</td>
                                                <td>Rizky Novriansyah</td>
                                                <td>Bangku, tv, lemari, makanan buka puasa, sistem aplikasi, mekanisme buka puasa saat bulan ramadhan</td>
                                                <td>
                                                    <div class="alert alert-info">
                                                        Sudah Verifikasi Ketua Takmir
                                                        <a href="#" class="alert-link"></a>
                                                    </div>
                                                </td>
                                                <td><button type="button" class="btn btn-info m-b-10 m-l-5">Lihat</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <!-- /# column -->
                    <!-- /# column -->
                    <div class="col-lg-4">
                        <!-- TAMBAH -->
                        <div class="card">
                            <div class="card-title">
                                <h4>Tambah Pekerjaan</h4>
                            </div>
                            <div class="card-body">
                                <div class="horizontal-form">
                                    <form method="post" action="<?php echo base_url('mainNotulensi/storePekerjaan'); ?>" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Nama Pekerjaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="namaProyek" class="form-control" placeholder="Nama Pekerjaan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Deskripsi singkat pekerjaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="deskripsiProyek" class="form-control" placeholder="Deskripsi singkat">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Penanggung Jawab</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="idAnggota">
                                                    <option>Pilih Penanggung Jawab</option>
                                                    <?php foreach ($anggotas as $anggota): ?>
                                                    <tr>
                                                        <td style="display:none"> </td>
                                                        <option value="<?php echo $anggota->id_anggota; ?>"><?php echo $anggota->nama; ?></option>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-success m-b-10 m-l-5">Buat pekerjaan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid 