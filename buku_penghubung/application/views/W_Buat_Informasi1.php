<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>arrafi/ubold/assets/images/favicon_1.ico">

        <title>Ubold - Responsive Admin Dashboard Template</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/morris/morris.css">
		
		<link href="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/responsive.css" rel="stylesheet" type="text/css" />
		
		 <link href="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />


        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/modernizr.min.js"></script>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
			                     <input type="text" placeholder="Search..." class="form-control">
			                     <a href=""><i class="fa fa-search"></i></a>
			                </form>


                            <ul class="nav navbar-nav navbar-right pull-right">
								<li class="dropdown hidden-xs">
								<?php if($notifPesan == 0) { ?>
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Pesan
                                    </a>
								<?php } else { ?>
									<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Pesan <span class="badge badge-xs badge-danger"><?php echo $notifPesan ?></span>
                                    </a>
								<?php } ?>	
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right"></span>Pemberitahuan Pesan</li>
										<?php foreach($ListnotifPesan as $row) { ?>
                                        <li class="list-group nicescroll notification-list">
                                           <!-- list item-->
                                           <a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewPesanHistory/<?php echo $row->nomor ?>/<?php echo $row->id_pesan ?>" class="list-group-item">
                                                 <div class="media-body">
                                                    <h5 class="media-heading"><?php echo $row->tanggal_pesan ?></h5>
                                                    <p class="m-0">
                                                        <small><?php echo $row->dari ?></small> :
														<small><?php echo $row->isi_pesan ?></small>
                                                    </p>
                                                 </div>
                                           </a>
										</li>
										<?php } ?>
									</ul>
								</li>
								<li class="dropdown hidden-xs">
								<?php if($notifInformasi == 0) { ?>
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Informasi
                                    </a>
								<?php } else { ?>
									<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        Informasi <span class="badge badge-xs badge-danger"><?php echo $notifInformasi ?></span>
                                    </a>
								<?php } ?>	
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right"></span>Pemberitahuan Informasi</li>
										<?php foreach($ListNotifInformasi as $row) { ?>
                                        <li class="list-group nicescroll notification-list">
                                           <!-- list item-->
                                           <a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewInformasiTerbaca2/<?php echo $row->id_informasi ?>" class="list-group-item">
                                                 <div class="media-body">
                                                    <h5 class="media-heading"><?php echo $row->tanggal ?></h5>
                                                    <p class="m-0">
                                                        <small><?php echo $row->subject_informasi ?></small><br>
														<small>Terbaca sebanyak : <?php echo $row->jumlah ?> orang</small>
														
                                                    </p>
                                                 </div>
                                           </a>
										</li>
										<?php } ?>
									</ul>
								</li>
								<?php if($notif == 0){ ?>
								<li class="hidden-xs">
                                    <a class="right-bar-toggle waves-effect waves-light"><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/homeSaran">Respon</a></a>
                                </li>
								<?php } else { ?>
								<li class="hidden-xs">
                                    <a class="right-bar-toggle waves-effect waves-light"><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/homeSaran">Respon <span class="badge badge-xs badge-danger"><?php echo $notif ?></span></a></a>
                                </li>
								<?php }  ?>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(); ?>arrafi/ubold/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                        	<li class="text-muted menu-title"><?php echo $status['nama_group'];?></li>

                            <li class="has_sub">
                                <a href="<?php echo base_url(); ?>index.php/Wali_Kelas/homeKegiatan" ><i class=" ti-notepad"></i> <span>Kegiatan</span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/addKegiatan">Buat Kegiatan</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewKegiatan">Lihat Kegiatan</a></li>
                                </ul>
                            </li>
							<li class="has_sub">
                                <a href="<?php echo base_url(); ?>index.php/Wali_Kelas/homePesan" ><i class=" md-email"></i> <span>Pesan</span> </a>
                                <ul class="list-unstyled">
                                    <li ><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/addPesan">Buat Pesan</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewPesanMasuk">Lihat Pesan Masuk</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewPesanTerkirim">Lihat Pesan Terkirim</a></li>
                                </ul>
                            </li>
							<li class="has_sub">
                                <a href="<?php echo base_url(); ?>index.php/Wali_Kelas/homeInformasi" class="waves-effect active"><i class=" ti-info"></i> <span>Informasi</span> </a>
                                <ul class="list-unstyled">
                                    <li class="active"><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/addInformasi">Buat Informasi</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewInformasiTerbaca">Lihat Informasi Terbaca</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewInformasiTerkirim">Lihat Informasi Terkirim</a></li>
                                </ul>
                            </li>
							<li >
                                <a href="<?php echo base_url(); ?>index.php/Wali_Kelas/homeSaran" ><i class="md-forum"></i> <span>Saran</span>  </a> 
                            </li>
							 
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title"><?php echo $user1['nama'];?></h4>
                                <p class="text-muted page-title-alt">Welcome to Ar - Rafi Web!</p>
                            </div>
                        </div>

                         <div class="row">
                           <div class="col-sm-12">
                        		<div class="card-box" align=center>
                        			<h4 class="m-t-0 header-title"><b>Informasi</b></h4>
                        			
                        			<div class="row">
									<div class="col-md-15">
									<form class="form-horizontal" role="form" action="<?php echo base_url()?>index.php/Wali_Kelas/tambahInformasi" method="post">
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Subject Pengumuman</label>
	                                                <div class="col-md-8">
	                                                    <input type="text"  class="form-control" placeholder="Subject Informasi" name="subject_info" required>
	                                                </div>
	                                            </div>
												
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Tanggal Pelaksanaan</label>
	                                                <div class="col-sm-8">
			                                				<div class="input-group">
																<input type="text" class="form-control" placeholder="Tahun-Bulan-Tanggal" id="datepicker-autoclose" name="tgl_info" required>
																<span class="input-group-addon bg-custom b-0 text-white" required><i class="icon-calender"></i></span>
															</div><!-- input-group -->
			                                			</div>

	                                            </div>
												
												 <table id="datatable" class="table table-striped table-bordered" >
												 
                                            <tbody align=center>
                                                <tr>
                                                    <td>
													<div class="form-group">
	                                                <?php 
												$i = 0;
												foreach($listOrangtua as $row) { ?>
												<input type="hidden" class="form-control chat-input" placeholder="Enter your text" name="id_orangtua[<?php echo $i?>]" value="<?php echo $row->idortu?>">
												<?php  
												$i++; } 	
												?>
	                                                <div class="col-md-12">
	                                                    <textarea required class="form-control" COLS=13 ROWS=12 name="isi_info" required></textarea>

	                                                </div>
	                                            </div>
												</td>
												
                                                    
												<tr>
												<td colspan=3 align=right>
												<div class="form-group">
													<div class="col-sm-offset-3 col-sm-9 m-t-15">
														<button type="submit" class="btn btn-primary">
															Submit
														</button>
														<button type="reset" class="btn btn-default m-l-5">
															Cancel
														</button>
													</div>
												</td>
												</tr>
                                            </tbody>
                                        </table>                                 
										</form>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>
                            </div>
                        <!-- end row -->


                        

                            <!-- col -->

                        	
                        	<!-- end col -->



                        
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2016 © Arrafi.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/counterup/jquery.counterup.min.js"></script>



        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/raphael/raphael-min.js"></script>

        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/pages/jquery.dashboard.js"></script>

        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/jquery.app.js"></script>

		<script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
		
		<script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		
		
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
			
			// Select2
                $(".select2").select2();
                
                $(".select2-limiting").select2({
				  maximumSelectionLength: 2
				});
				
			   $('.selectpicker').selectpicker();
	            $(":file").filestyle({input: false});
	            });
				
				



        </script>

		<script type="text/javascript">
		 // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-autoclose').datepicker({
					format: "yyyy-mm-dd",
                	autoclose: true,
                	todayHighlight: true
                });
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple-date').datepicker({
                    format: "yyyy-mm-dd",
					clearBtn: true,
					multidate: true,
					multidateSeparator: ","
                });
                jQuery('#date-range').datepicker({
                    toggleActive: true
                });
		</script>


    </body>
</html>