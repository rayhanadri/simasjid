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
                        <!-- EDIT -->
                        <div id="editAnggotaCard" class="card">
                            <div class="card-title">
                                <h4>Edit Anggota</h4>
                            </div>
                            <div class="card-body">
                                <div class="horizontal-form">
                                    

                                    <form method="post" action="<?php echo base_url('mainKeanggotaan/storeAnggota'); ?>" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="idAnggota" class="form-control hidden" placeholder="Nama Anggota" value="<?php echo $anggota->id; ?>">
                                                <input type="text" name="namaAnggota" class="form-control" placeholder="Nama Anggota" value="<?php echo $anggota->nama; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jabatanAnggota">
                                                    <?php foreach ($jabatans as $jabatan): ?>
                                                    <tr>
                                                        <td style="display:none"> </td>
                                                        <option <?php if ($jabatan->id == $anggota->id_jabatan) echo 'selected'?> value="<?php echo $jabatan->id; ?>"><?php echo $jabatan->keterangan; ?></option>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="usernameAnggota" class="form-control" placeholder="Username" value="<?php echo $anggota->username; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="passwordAnggota" class="form-control" placeholder="Password" value="<?php echo $anggota->password; ?>">
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
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid 