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
		
		<link href="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/responsive.css" rel="stylesheet" type="text/css" />
		
		 <link href="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
		<script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/reload.js"></script>
		<script language="JavaScript">
			setInterval("SANAjax();", 3500 );  // set berapa detik melakukan refresh div

			$(function() {
				SANAjax = function(){
				$('#NotifDisplay').load("<?php echo base_url(); ?>index.php/Tata_Usaha/NotifikasiSaran").fadeIn("slow");  // load berarti melakukan load file
			}
			});
		</script>

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


                            <ul class="nav navbar-nav navbar-right pull-right" >
							<li class="dropdown hidden-xs" id="NotifDisplay">

							</li>
							<li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(); ?>arrafi/ubold/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/Guru/logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
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
					<?php if($status['nama_group'] == 'Wali-Kelas' || $status['nama_group'] == 'Guru' || $status['nama_group'] == 'Orang-Tua') { ?>
						<ul>
                        	<li class="text-muted menu-title"><?php echo $status['nama_group'];?></li>
							<li >
                                <a href="<?php echo base_url(); ?>index.php/Tata_Usaha/logout" ><span>Logout</span>  </a> 
                            </li>
                        </ul>
					<?php } else { ?>
						<ul>
                        	<li class="text-muted menu-title"><?php echo $status['nama_group'];?></li>
							<li >
                                <a href="<?php echo base_url(); ?>index.php/Tata_Usaha/logout" ><span>Logout</span>  </a> 
                            </li>
                        </ul>
                        <ul>
                        	<li class="text-muted menu-title"><?php echo $status['nama_group'];?></li>
							<li>
                                <a href="<?php echo base_url(); ?>index.php/Tata_Usaha/homeSaran" ><i class="md-forum"></i> <span>Saran</span> </a>
                            </li>
							<li class="has_sub">
                                <a href="<?php echo base_url(); ?>index.php/Tata_Usaha/homeLaporan" class="waves-effect active"><i class="ion-ios7-compose-outline"></i> <span>Laporan</span>  </a> 
								<ul class="list-unstyled">
                                    <li ><a href="<?php echo base_url(); ?>index.php/Tata_Usaha/homeLaporan">Buat Laporan</a></li>
                                    <li class="active"  ><a href="<?php echo base_url(); ?>index.php/Tata_Usaha/viewLaporan">Lihat Laporan</a></li>
                                </ul>
                            </li>
                        </ul>
					<?php } ?>
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
							<?php if($status['nama_group'] == 'Wali-Kelas' || $status['nama_group'] == 'Guru' || $status['nama_group'] == 'Orang-Tua') { ?>
							<div class="row">
                           <div class="col-sm-12">
                                <h4 class="page-title"><?php echo $user1['nama'];?></h4>
                                <p class="text-muted page-title-alt">Maaf anda Bukan Tata Usaha Silahkan Logout Dari aplikasi ini Terima kasih</p>
                            </div>
                        	</div>
							<?php } else { ?>
                            <div class="row">
                           <div class="col-sm-12">
                        		<div class="card-box">
                                    <table id="datatable" class="table table-striped table-bordered">
                                            <thead align=center>
                                                <tr>
                                                    <th><h2 class="panel-title" align=center>Data Laporan</h2></th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
												$i=1;
												foreach($listLaporan as $row) { ?>
												<tr>
                                                    <td>
													<div class="panel panel-primary">
									<div class="panel-heading">
									
										<h5 class="panel-title" align=center style="color:white;">Laporan Tanggal <?php echo $row->tanggal_laporan?></h5>
									
									</div>
									<div class="panel-body">
										<p>Oleh : <?php echo $user1['nama'];?><br>
										</p>
										<p  class="page-header">
										Laporan Ke : <?php echo $row->id_laporan?>
										</p>
										<p align=right>
													<button type="submit" class="btn btn-primary waves-effect waves-light">
                                                   <a style="color:white;" href="<?php echo base_url()?>index.php/Tata_Usaha/viewDetailLaporan/<?php echo $row->id_laporan?>">Lihat </a></button>
										</p>
										<p align=right>
										<button type="button" class="btn btn-success waves-effect waves-light">
                                                   <span class="btn-label"><i class="fa fa-check"></i>
                                                   </span><a style="color:White">
												   <?php echo anchor('/Tata_Usaha/edit_Laporan/'.$row->id_laporan,'<z style="color:white">Edit</z>');?></a>
												   </button>

                                                <button type="button" class="btn btn-danger waves-effect waves-light">
                                                   <span class="btn-label"><i class="fa fa-times"></i>
                                                   </span><?php echo anchor('/Tata_Usaha/deleteLaporan/'.$row->id_laporan,'<z style="color:white">Delete</z>');?></button>
										</p>
									</div>
									</div>
													
													</td>
                                                </tr>
												<?php $i++; } ?>
                                            </tbody>
                                        </table>
                        			</div>
                        		</div>
                        	</div>
							<?php }  ?>
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
		
		<script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/datatables/dataTables.bootstrap.js"></script>


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
			$(document).ready(function() {
                $('#datatable').dataTable();
            } );
		</script>



    </body>
</html>