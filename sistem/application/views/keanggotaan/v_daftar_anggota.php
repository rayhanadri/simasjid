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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Daftar Anggota</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="display:none">id jabatan</th>
                                                <th>Nama</th>
                                                <th>Posisi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $count = 1;
                                            foreach ($anggotas as $anggota): ?>
                                            <tr>
                                                <td style="display:none"> <?php echo $anggota->id_jabatan; ?></td>
                                                <td> <?php echo $anggota->nama; ?></td>
                                                <td> <?php echo $anggota->keterangan; ?></td>
                                                <td> 
                                                    <button onclick="location.href='<?php echo base_url('edit_anggota/'.$anggota->id_anggota); ?>'" type="button" class="btn btn-warning m-b-10 m-l-5">Edit</button> 
                                                    <a href="<?php echo base_url('hapus_anggota/'.$anggota->id_anggota); ?>"><button onclick="return confirm('Konfirmasi untuk hapus?')" type="button" class="btn btn-danger m-b-10 m-l-5">Hapus</button></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <!-- /# column -->
                    <!-- /# column -->
                    <div class="col-lg-6">
                        <!-- EDIT -->
                        <div id="editAnggotaCard" class="card hidden">
                            <div class="card-title">
                                <h4>Edit Anggota</h4>
                            </div>
                            <div class="card-body">
                                <div class="horizontal-form">
                                    <form method="post" action="<?php echo base_url('mainKeanggotaan/storeAnggota'); ?>" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="namaAnggota" class="form-control" placeholder="Nama Anggota">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jabatanAnggota">
                                                    <option>Pilih Jabatan</option>
                                                    <?php foreach ($jabatans as $jabatan): ?>
                                                    <tr>
                                                        <td style="display:none"> </td>
                                                        <option value="<?php echo $jabatan->id; ?>"><?php echo $jabatan->keterangan; ?></option>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-success m-b-10 m-l-5">edit anggota</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- TAMBAH -->
                        <div class="card">
                            <div class="card-title">
                                <h4>Tambah Anggota</h4>
                            </div>
                            <div class="card-body">
                                <div class="horizontal-form">
                                    <form method="post" action="<?php echo base_url('mainKeanggotaan/storeAnggota'); ?>" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="namaAnggota" class="form-control" placeholder="Nama Anggota">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jabatanAnggota">
                                                    <option>Pilih Jabatan</option>
                                                    <?php foreach ($jabatans as $jabatan): ?>
                                                    <tr>
                                                        <td style="display:none"> </td>
                                                        <option value="<?php echo $jabatan->id; ?>"><?php echo $jabatan->keterangan; ?></option>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-success m-b-10 m-l-5">tambah anggota</button>
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
            <!-- End Container fluid -->
<script>

    function editAnggota(id){
        var idAnggota = document.getElementById("ayam").value; 
        console.log("id : "+idAnggota);
    }

</script>

    