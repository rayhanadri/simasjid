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
                        <?php //var_dump($listProgress); ?>
                        <div class="card">
                            <div id="invoice" class="effect2">
                                <div id="invoice-top">
                                    <!--End Info-->
                                    <div class="title col-lg-12">
                                        <!-- <h4>Pekerjaan #<?php echo $detailProgress[0]->id; ?></h4> -->
                                        <p>Penanggung Jawab: <?php echo $detailProgress[0]->nama_anggota; ?><br><span class="badge badge-warning">Sedang berjalan</span>
                                        </p>
                                    </div>
                                    <!--End Title-->
                                    <div id="col-lg-6">
                                        <br>
                                        <h2><?php echo $detailProgress[0]->nama_proyek; ?></h2>
                                        <p><?php echo $detailProgress[0]->deskripsi; ?></p>
                                    </div>
                                </div>
                                <!--End InvoiceTop-->
                                <!--End Invoice Mid-->

                                <div id="invoice-bot">

                                    <div id="invoice-table">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr class="tabletitle">
                                                    <td class="table-item">
                                                        <h2>Deskripsi Progress</h2>
                                                    </td>
                                                    <td class="table-item">
                                                        <h2>Tanggal</h2>
                                                    </td>
                                                    <td class="table-item">
                                                        <h2>Status</h2>
                                                    </td>
                                                    <td class="table-item">
                                                        <h2>Aksi</h2>
                                                    </td>
                                                </tr>
                                                <?php foreach($listProgress as $progress) : ?>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext"><?php echo $progress->keterangan; ?></p>
                                                    </td>
                                                    <td class="tableitem">
                                                        <p class="itemtext"><?php echo $progress->created_at; ?></p>
                                                    </td>
                                                    <td class="tableitem">
                                                        <?php if($progress->status_verifikasi == 0) {
                                                            echo '<p class="itemtext"><span class="badge badge-warning">Belum terverifikasi</span></p>';
                                                        } else if ($progress->status_verifikasi == 1) {
                                                            echo '<p class="itemtext"><span class="badge badge-success">terverifikasi</span></p>';
                                                        } else {
                                                            echo '<p class="itemtext"><span class="badge badge-secondary">tidak diverifikasi</span></p>';
                                                        }?>
                                                        
                                                    </td>
                                                    <td class="tableitem">
                                                        <p class="itemtext"><button type="button" class="btn btn-info m-b-10 m-l-5">Detail</button></p>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                    <!--End Table-->
                                </div>
                                <!--End InvoiceBot-->
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid 