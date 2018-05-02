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
		
		<link href="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
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
			setInterval("SANAjaxPesan();", 1000 );  // set berapa detik melakukan refresh div

			$(function() {
				SANAjaxPesan = function(){
				$('#NotifPesan').load("<?php echo base_url(); ?>index.php/Wali_Kelas/NotifPesan").fadeIn("slow");  // load berarti melakukan load file
			}
			});
		</script>
		
		<script language="JavaScript">
			setInterval("SANAjaxInfo();", 1000 );  // set berapa detik melakukan refresh div

			$(function() {
				SANAjaxInfo = function(){
				$('#NotifInformasi').load("<?php echo base_url(); ?>index.php/Wali_Kelas/NotifInformasi").fadeIn("slow");  // load berarti melakukan load file
			}
			});
		</script>
		
		<script language="JavaScript">
			setInterval("SANAjaxSar();", 1000 );  // set berapa detik melakukan refresh div

			$(function() {
				SANAjaxSar = function(){
				$('#NotifSaran').load("<?php echo base_url(); ?>index.php/Wali_Kelas/NotifSaran").fadeIn("slow");  // load berarti melakukan load file
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


                            <ul class="nav navbar-nav navbar-right pull-right">
								<li class="dropdown hidden-xs" id="NotifPesan">
								
								</li>
								
								<li class="dropdown hidden-xs" id="NotifInformasi">
								
								</li>
								
								<li class="hidden-xs" id="NotifSaran">
								
								</li>
								<li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(); ?>arrafi/ubold/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
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
                        <?php if($jumlah == 2) { ?>
						<ul>
							<li class="text-muted menu-title">Guru</li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect active" ><i class=" ti-notepad"></i> <span>Kegiatan</span> </a>
                                <ul class="list-unstyled">
                                    <li  class="active"><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/addKegiatan">Buat Kegiatan</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewKegiatan">Lihat Kegiatan</a></li>
                                </ul>
                            </li>

                        	<li class="text-muted menu-title">Wali-Kelas</li>
							<li class="has_sub">
                                <a href="#" ><i class=" md-email"></i> <span>Pesan</span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/addPesan">Buat Pesan</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewPesanMasuk">Lihat Pesan Masuk</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewPesanTerkirim">Lihat Pesan Terkirim</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewPesanStatus">Lihat Status Pesan</a></li>
                                </ul>
                            </li>
							<li class="has_sub">
                                <a href="#" ><i class=" ti-info"></i> <span>Informasi</span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/addInformasi">Buat Informasi</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewInformasiTerbaca">Lihat Informasi Terbaca</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewInformasiTerkirim">Lihat Informasi Terkirim</a></li>
                                </ul>
                            </li>
							<li class="has_sub">
                                <a href="#"><i class="md-forum"></i> <span>Saran</span>  </a>
                                <ul class="list-unstyled">
                                    <li ><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/LihatPembahasan">Lihat Pembahasan</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/SaranOrtu">Lihat Saran Orang Tua</a></li>
                                </ul>
                            </li>
							<li class="has_sub">
                                <a href="#" ><i class="ion-ios7-compose-outline"></i>  <span>Laporan</span>  </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/homeLaporan">Buat Laporan</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewLaporan">Lihat Laporan</a></li>
                                </ul>
                            </li>
							 
                        </ul>
						<?php } else {  ?>
						<ul>
						<li class="text-muted menu-title">Guru</li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect active"><i class=" ti-notepad"></i> <span>Kegiatan</span> </a>
                                <ul class="list-unstyled">
                                    <li class="active"><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/addKegiatan">Buat Kegiatan</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/Wali_Kelas/viewKegiatan">Lihat Kegiatan</a></li>
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
                            <div class="col-sm-12" >
                            </div>
                        </div>

                        <div class="row">
                           <div class="card-box">
						   <div class="col-md-15">
											<form  class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/Wali_Kelas/Cariedit_Laporan" method="get">
	                                            <div class="form-group" >
	                                                <label class="col-md-2 control-label">Pembahasan</label>
													<div class="col-md-8">
													<div class="input-group m-b-15">
													<div class="bootstrap-timepicker">
													<?php foreach($listLaporan as $row) { ?>
													<input type="hidden" class="form-control" name="laporan" value="<?php echo $row->id_laporan?>"/>
													<?php } ?>
														 <select class="selectpicker show-tick" data-style="btn-white" name="bahas">
													<?php foreach($ListPembahasan as $row) { ?>
													<option  value="<?php echo $row->id_pembahasan ?>"><?php echo $row->nama_pembahasan ?> </option>
													<?php } ?>
												</select>
													</div>
												<span class="input-group-addon btn btn-primary"><button type="submit" class="btn-primary" >
															Submit
														</button></span>
												</div>
												</div>
												</div>
											</form>
                        					<form class="form-horizontal" role="form" action="<?php echo base_url()?>index.php/Wali_Kelas/editLaporan" method="post">
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Judul Pembahasan</label>
													<div class="col-md-8">
	                                                   <input type="text" class="form-control"  readonly="Pembahasan" name="" value="<?php echo $bahas['nama_pembahasan'];?>" required>
													   <input type="hidden" class="form-control"  readonly="Pembahasan" name="pembahasan" value="<?php echo $bahas['id_pembahasan'];?>" required>
													</div>
												</div>
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Hari</label>
													<div class="col-md-2">
													<label class="col-md-14 control-label">
													<?php if($bahas_awal['hari'] == 'Mon') { ?>
													Senin, 
													<?php } else if($bahas_awal['hari'] == 'Tue') { ?>
													Selasa,
													<?php } else if($bahas_awal['hari'] == 'Wed') { ?>
													Rabu,
													<?php } else if($bahas_awal['hari'] == 'Thu') { ?>
													Kamis,
													<?php } else if($bahas_awal['hari'] == 'Fri') { ?>
													Jum'at,
													<?php } else if($bahas_awal['hari'] == 'Sat') { ?>
													Sabtu,
													<?php } else  { ?>
													Minggu,
													<?php } ?>
													<?php echo $bahas_awal['tgl'];?></label>
													</div>
												</div>
												<div class="form-group">
												<label class="col-md-2 control-label">Waktu Tanggapan</label>
													<div class="input-group m-b-4">
														<div class="col-sm-8">
															<div class="input-daterange input-group" >
																<input type="text" class="form-control" readonly="Jam Awal" name="awal" value="<?php echo $bahas_awal['jam'];?> : <?php echo $bahas_awal['menit'];?>" required>
																<span class="input-group-addon btn-primary text-white">SD</span>
																<input type="text" class="form-control" readonly="Jam Akhir" name="akhir" value="<?php echo $bahas_akhir['jam'];?> : <?php echo $bahas_akhir['menit'];?>"required>
															</div>
														</div>
													</div>
												</div> 
												
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Jumlah Orang Tua </label>
													<div class="col-md-2">
													<label class="col-md-7 control-label"><?php echo $jumlahOrtu;?> Orang</label> 
													</div>
												</div>
												
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Jumlah Orang Tua Aktif</label>
													<div class="col-md-2">
													<label class="col-md-10 control-label"><?php echo $jumlahBahas;?> Dari <?php echo $jumlahOrtu;?> Orang</label>
													</div>
												</div>
												 <table id="datatable" class="table table-striped table-bordered" >
												 
                                            <tbody>
											<?php foreach($listLaporan as $row) { ?>
											   <tr>
                                                    <td>
													<div class="form-group" onclick="document.getElementById('demo2').innerHTML = ''">
	                                                <div class="col-md-12" >
														<input type="hidden" class="form-control" name="id" value="<?php echo $row->id_laporan?>"/>
	                                                    <textarea class="form-control summernote" COLS=13 ROWS=12 name="isi" >
														<?php 
														if($this->session->flashdata('Kosong') == TRUE) {
														 echo $row->isi_laporan;
														} else{
														 echo $row->isi_laporan; 
														} ?></textarea>
													<ul class="parsley-errors-list filled" id="demo2" align=center><li class="parsley-required"><?php echo $this->session->flashdata('Kosong'); ?></li></ul>
	                                                </div>
	                                            </div>
												</td>
												</tr> 
												<?php } ?>
												<tr>
												<td align=right>
												<div class="form-group">
													<div class="col-sm-offset-3 col-sm-9 m-t-15">
														<button type="submit" class="btn btn-primary">
															Edit
														</button>
														<button type="reset" class="btn btn-default m-l-5">
															Cancel
														</button>
													</div>
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
		<script src="<?php echo base_url(); ?>arrafi/ubold/assets/plugins/summernote/dist/summernote.min.js"></script>
		


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
		
		
		
		<script>
            jQuery(document).ready(function(){

                $('.summernote').summernote({
					
					height: 350, 
					
					toolbar: [
					['style', ['style']],
					//['font', ['bold', 'italic', 'underline', 'clear']],
					['font', ['bold', 'italic', 'underline', 'clear']],
					['fontname', ['fontname']],
					['fontsize', ['fontsize']],
					//['color', ['color']],
					['para', ['ul', 'ol', 'paragraph']],
					['height', ['height']],
					//['table', ['table']],
					//['insert', ['link', /*'picture',*/ 'hr']],
					//['insert', ['hr']],
					['view', ['codeview']],
					['help', ['help']]
					]
                });
                
				$('.inline-editor').summernote({
                    airMode: true            
                });
               

            });
        </script>


		<script type="text/javascript">
			$(document).ready(function() {
                $('#datatable').dataTable();
            } );
		
		</script>
		
			





    </body>
</html>