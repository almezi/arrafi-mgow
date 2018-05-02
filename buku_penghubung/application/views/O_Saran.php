<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
		<meta http-equiv="refresh" content="">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>arrafi/ubold/assets/images/favicon_1.ico">

        <title>Ubold - Responsive Admin Dashboard Template</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/morris/morris.css">

        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>arrafi/ubold/assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/reload.js"></script>
		<script language="JavaScript">
			setInterval("SANAjax();", 1000 );  // set berapa detik melakukan refresh div

			$(function() {
				SANAjax = function(){
				$('#AutodataDisplay').load("<?php echo base_url(); ?>index.php/Orang_Tua/Isi_Saran/<?php echo $nip['nip'];?>/<?php echo $bahas['id_pembahasan'];?>").fadeIn("slow");  // load berarti melakukan load file
			}
			});
		</script>
		
		<script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/reload.js"></script>
		<script language="JavaScript">
			setInterval("SANAjaxKeg();", 1000 );  // set berapa detik melakukan refresh div

			$(function() {
				SANAjaxKeg = function(){
				$('#NotifKegiatan').load("<?php echo base_url(); ?>index.php/Orang_Tua/NotifKegiatan").fadeIn("slow");  // load berarti melakukan load file
			}
			});
		</script>
		
		<script language="JavaScript">
			setInterval("SANAjaxPesan();", 1000 );  // set berapa detik melakukan refresh div

			$(function() {
				SANAjaxPesan = function(){
				$('#NotifPesan').load("<?php echo base_url(); ?>index.php/Orang_Tua/NotifPesan").fadeIn("slow");  // load berarti melakukan load file
			}
			});
		</script>
		
		<script language="JavaScript">
			setInterval("SANAjaxInfo();", 1000 );  // set berapa detik melakukan refresh div

			$(function() {
				SANAjaxInfo = function(){
				$('#NotifInformasi').load("<?php echo base_url(); ?>index.php/Orang_Tua/NotifInformasi").fadeIn("slow");  // load berarti melakukan load file
			}
			});
		</script>
		
		<script language="JavaScript">
			setInterval("SANAjaxSar();", 1000 );  // set berapa detik melakukan refresh div

			$(function() {
				SANAjaxSar = function(){
				$('#NotifSaran').load("<?php echo base_url(); ?>index.php/Orang_Tua/NotifSaran").fadeIn("slow");  // load berarti melakukan load file
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


    <body class="fixed-left" >

        <!-- Begin page -->
        <div id="wrapper" >

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
								<li class="dropdown hidden-xs" id="NotifKegiatan">
								
								</li>
								<li class="dropdown hidden-xs" id="NotifPesan">
								
								</li>
								<li class="dropdown hidden-xs" id="NotifInformasi">
								
								</li>
								<li class="dropdown hidden-xs" id="NotifSaran">
								
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
                        <ul>

                        	<li class="text-muted menu-title"><?php echo $status['nama_group'];?></li>

                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Orang_Tua/homeKegiatan"  ><i class=" ti-notepad"></i> <span>Kegiatan</span> </a>
                            </li>
							<li class="has_sub">
                                <a href="#" ><i class=" md-email"></i> <span>Pesan</span> </a>
                                <ul class="list-unstyled">
									<li><a href="<?php echo base_url(); ?>index.php/Orang_Tua/viewPesanMasuk">Lihat Pesan Masuk</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/Orang_Tua/viewPesanTerkirim">Lihat Pesan Terkirim</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="<?php echo base_url(); ?>index.php/Orang_Tua/homeInformasi"><i class=" ti-info"></i> <span>Informasi</span> </a>
                            </li>
							<li class="has_sub">
                                <a href="#"  class="waves-effect active"><i class="md-forum"></i> <span>Saran</span> </a>
                                <ul class="list-unstyled">
									<li><a href="<?php echo base_url(); ?>index.php/Orang_Tua/homeSaran">Buat Saran</a></li>
                                </ul>
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

                        <div class="row" >
                           <div class="col-sm-12">
                        		<div class="card-box">
								<h4 class="m-t-0 m-b-20 header-title"><b>Group Wali Kelas <?php echo $nip['nama'];?></b></h4>
								<h4 class="m-t-0 m-b-20 header-title"><b><?php echo $bahas['nama_pembahasan'];?></b></h4>
								<h4 class="parsley-errors-list filled" id="demo" align=center style="color:red;"><b class="parsley-required"><?php echo $this->session->flashdata('message'); ?></b></h4>

                            		<div class="chat-conversation" >
                                        <ul class="conversation-list nicescroll" id="AutodataDisplay">
										
										</ul>
                                        <div class="row">
											<?php if($bahas['status_pembahasan'] == 'Tutup') { ?>
											<?php  } else { ?>
                                            <form class="form-horizontal" role="form" action="<?php echo base_url()?>index.php/Orang_Tua/addSaran/<?php echo $nip['nip'];?>/<?php echo $bahas['id_pembahasan'];?>" method="post" enctype="multipart/form-data">
                                            <div class="col-sm-9 chat-inputbar">
                                                <input type="text" class="form-control chat-input" placeholder="Enter your text" name="isi_res" value="<?php echo $this->session->flashdata('isi'); ?>" onclick="document.getElementById('demo').innerHTML = ''" required>
												<input type="hidden" class="form-control chat-input" placeholder="Pembahasan" name="pembahasan" value="<?php echo $bahas['id_pembahasan'];?>">
												<input type="hidden" class="form-control chat-input" placeholder="Enter your text" name="dari" value="<?php echo $user1['nama'];?>">
												<input type="hidden" class="form-control chat-input" placeholder="Enter your text" name="nip" value="<?php echo $nip['nip'];?>">
												<?php 
												$i = 0;
												foreach($listOrangtua2 as $row) { ?>
												<input type="hidden" class="form-control chat-input" placeholder="Enter your text" name="idortu[<?php echo $i?>]" value="<?php echo $row->idortu?>">
												<?php  
												$i++; } 	
												?>
												
                                            </div>
                                            <div class="col-sm-3 chat-send">
                                                <button type="submit" class="btn btn-md btn-info btn-block waves-effect waves-light">Send</button>
                                            </div>
										</form>
										<?php  }  ?>
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
		 <script src="<?php echo base_url(); ?>arrafi/ubold/assets/js/auto_load.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>
		
		<script type="text/javascript">
    /*var auto_refresh = setInterval(
    function () {
       $('#load_content').load('O_Saran.php').fadeIn("slow");
    }, 10000); // refresh setiap 10000 milliseconds*/
    
</script>




    </body>
</html>