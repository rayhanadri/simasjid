        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Notulensi</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Notulensi</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Daftar Notulensi</h4>
                                <a href="<?php echo base_url('buat_notulensi'); ?>"><button style="float:right" type="button" class="btn btn-primary m-b-10 m-l-5">Buat Notulensi</button></a>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php //var_dump($notulens); ?>
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="display:none">idNotulen</th>
                                                <th>Tanggal Notulensi</th>
                                                <th>Notulen Musyawarah</th>
                                                <th>Pokok Bahasan</th>
                                                <th>Verifikasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($notulens as $notulen): ?>
                                            <tr>
                                                <td style="display:none"><?php echo $notulen->created_at; ?></td>
                                                <td><?php echo $notulen->created_at; ?></td>
                                                <td><?php echo $notulen->nama; ?></td>
                                                <td><?php echo $notulen->pokok_bahasan; ?></td>
                                                <td>
                                                    <?php if($notulen->diverifikasi_amir == 0){ ?>
                                                        <div class="alert alert-danger">
                                                            Belum Verifikasi Amir  
                                                            <?php if($notulen->id_takmir == $i_takmir){ ?>
                                                                <br><a href="#" class="alert-link"><i class="fa fa-check-square-o"></i>Verifikasi Sekarang</a>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="alert alert-info">
                                                            Sudah diverifikasi Amir  
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('notulensi/'.$notulen->id_notulensi);?>"><button type="button" class="btn btn-info m-b-10 m-l-5">Lihat</button></a>
                                                    <?php if($notulen->id_notulen == $i_takmir){ ?>
                                                        <a href="<?php echo base_url('notulensi/'.$notulen->id_notulensi);?>"><button type="button" class="btn btn-warning m-b-10 m-l-5">Edit</button></a>
                                                    <?php } ?>
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
                </div>
                <!-- /# row -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid 