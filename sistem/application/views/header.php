<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/ibnusina.jpg')?>">
    <title>Admin Masjid</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/css/lib/bootstrap/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?php echo base_url('assets/css/lib/calendar2/semantic.ui.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/lib/calendar2/pignose.calendar.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/lib/owl.carousel.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/lib/owl.theme.default.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/helper.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">

    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">
                        <!-- Logo icon -->
                        <b><img src="<?php echo base_url('/assets/images/ibnusina.jpg'); ?>" style="height: 45px" alt="homepage" class="dark-logo" /></b>
                        <!-- <b><img src="http://4.bp.blogspot.com/-pxvh8Wa-dAc/UPVS5HzYENI/AAAAAAAAAN4/wMgw0UQOTbI/s1600/perum-jasa-tirta-1.jpg" alt="homepage" class="dark-logo" /></b> -->
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!-- <span><img src="<?php //echo base_url('assets/images/logo-text.png'); ?>" alt="homepage" class="dark-logo" /></span> -->
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item">
                            <a class="nav-link nav-toggler hidden-md-up text-muted" href="javascript:void(0)">
                                <i class="mdi mdi-menu"></i>
                            </a>
                        </li>
                        <li class="nav-item m-l-10">
                            <a class="nav-link sidebartoggler hidden-sm-down text-muted" href="javascript:void(0)">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Comment -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                                <div id="notifikasi">
                                        <!-- <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>     -->
                                </div>
								
							</a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <!-- <a href="#"> -->
                                                <!-- <div class="btn btn-danger btn-circle m-r-10"> -->
                                                    <!-- <i class="fa fa-link"> -->
                                                        <!-- <i class="fa fa-wrench"></i></div> -->
                                                <!-- <div id="kendaraan" class="mail-contnet"> -->
                                                    <!-- <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> -->
                                                <!-- </div> -->
                                            <!-- </a> -->
                                            <!-- Message -->
                                            <!-- <a href="#"> -->
                                                <!-- <div class="btn btn-success btn-circle m-r-10"> -->
                                                    <!-- <i class="ti-calendar"> -->
                                                        <!-- <i class="fas fa-route"></i></div> -->
                                                <!-- <div id="tujuan" class="mail-contnet"> -->
                                                    <!-- <h5>This is another title</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> -->
                                                <!-- </div> -->
                                            <!-- </a> -->
                                            <a href="" id="boxTujuanTambahan">
                                                <div class="btn btn-info btn-circle m-r-10">
                                                    <!-- <i class="ti-calendar"> --><i class="fa fa-road"></i></div>
                                                <div id="tujuanTambahan" class="mail-contnet">
                                                </div>
                                            </a>
                                            <a href="" id="boxKesehatanKendaraan">
                                                <div class="btn btn-success btn-circle m-r-10">
                                                    <!-- <i class="ti-calendar"> --><i class="fa fa-car"></i></div>
                                                <div id="kesehatanKendaraan" class="mail-contnet">
                                                </div>
                                            </a>
                                            <a href="" id="boxTambahanBbm">
                                                <div class="btn btn-info btn-circle m-r-10">
                                                    <!-- <i class="ti-calendar"> --><i class="fa fa-files-o"></i></div>
                                                <div id="tambahanBbm" class="mail-contnet">
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <!-- <a href="#">
                                                <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is title</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a> -->
                                            <!-- Message -->
                                            <!-- <a href="#">
                                                <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is another title</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a> -->
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->
                        
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('/assets/images/img.jpg'); ?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="<?php echo base_url('logout');?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
