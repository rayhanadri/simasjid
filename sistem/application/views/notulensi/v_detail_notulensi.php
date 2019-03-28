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
                    <div class="col-lg-12">
                        <?php 
                            // var_dump($notulens); 
                            // var_dump($pembawa_notulens); 
                            $listJudulProgres = explode("$",$notulens[0]->pokok_bahasan);
                            $listDetailProgres= explode("$",$notulens[0]->gabungan_progres); 
                            $listKeputusanProyek= explode("$",$notulens[0]->gabungan_keputusan_progres); 
                            $listStatusProyek= explode("$",$notulens[0]->status_proyek); 
                            // var_dump($listStatusProyek); 
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <!-- Left sidebar -->
                                    <div class="inbox-leftbar">
                                        <h6 class="">Pembahasan Pekerjaan</h6>
                                        <div class="list-group b-0 mail-list">
                                            <?php
                                                $count = 0; 
                                                foreach($listJudulProgres as $judulProgres): ?>
                                                <a href="#" class="list-group-item border-0"><span class="fa fa-circle text-success
                                                mr-2"></span><?php echo $judulProgres; ?> </a>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <!-- End Left sidebar -->
                                    <div class="inbox-rightbar">
                                        <div class="mt-4">
                                            <h5>Tanggal <?php echo $notulens[0]->created_at; ?></h5>
                                            <hr/>
                                            <div class="media mb-4 mt-1">
                                                <div class="media-body">
                                                    <span class="pull-right">07:23 AM</span>
                                                    <h6 class="m-0"><?php echo $notulens[0]->nama; ?></h6>
                                                    <small class="text-muted">Notulen: <?php echo $pembawa_notulens[0]->nama; ?></small>
                                                </div>
                                            </div>
                                            <?php
                                                $count = 0; 
                                                foreach($listJudulProgres as $judulProgres): ?>
                                                <p><b><span class="fa fa-circle text-light
                                                mr-2"></span><?php echo $judulProgres ?></b></p>    
                                                <p><?php echo $listDetailProgres[$count].'<br><i class="fa fa-comment"></i> '.$listKeputusanProyek[$count++]; ?></p>
                                            <?php endforeach ?>
                                            <hr/>
                                        </div>
                                        <!-- card-box -->

                                        <!-- <div class="media mb-0 mt-5">
                                            <div class="media-body">
                                                <div class="card-box">
                                                    <div class="summernote">
                                                        <h6>Terdapat progres pekerjaan yang belum diverifikasi.</h6>
                                                        <ul>
                                                        <?php
                                                            $count = 0; 
                                                            foreach($listJudulProgres as $judulProgres): ?>
                                                            <li>
                                                                <a href="#" class="list-group-item border-0"><span class="fa fa-circle text-warning mr-2"></span><?php echo $judulProgres; ?></a>
                                                            </li>
                                                        <?php endforeach ?>
                                                            
                                                        </ul>
                                                        <br>
                                                        <p>
                                                            Untuk verifikasi notulensi harap menverifikasi semua pekerjaan terlebih dahulu
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="text-right">
                                            <button type="button" class="btn btn-default waves-effect waves-light w-md m-b-30">Verifikasi</button>
                                            <!-- <button type="button" class="btn btn-primary waves-effect waves-light w-md m-b-30">Verifikasi</button> -->
                                        </div>

                                    </div>
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