<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon_1.ico">

        <title>SD Ar-rafi' Bandung</title>
		
		<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Morris Chart CSS -->
		<link href="<?php echo base_url()?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
		
		
		
		
		
		<!-- Editable Table -->
		<link href="<?php echo base_url()?>assets/plugins/magnific-popup/dist/magnific-popup.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/plugins/jquery-datatables-editable/datatables.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
		
		<!-- DataTables -->
		<link href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
		
		<!-- Plugins CSS -->
        <link href="<?php echo base_url()?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/wizards/steps.min.js"></script>
		 <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
		
        
        <link href="<?php echo base_url()?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/wizard_steps.js"></script>
		
		
		
		<!--Form Picker -->
        <link href="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>" rel="stylesheet" type="text/css" />
		
		<link href="<?php echo base_url('assets/plugins/jquery.steps/demo/css/jquery.steps.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/bootstrap-table/dist/bootstrap-table.min.css');?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		
		<style type="text/css">
			.upper { text-transform: uppercase; }
			.lower { text-transform: lowercase; }
			.cap   { text-transform: capitalize; }
			.small { font-variant:   small-caps; }
		</style>
		

		<script src="<?php echo base_url()?>assets/js/jquery-1.4.3.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/modernizr.min.js"></script>
		<script type="text/javascript" >
		var x = 1;
		function cek(){
		$.ajax({
        url: "<?php echo base_url(); ?>ortu/ceknotif",
        cache: false,
        success: function(msg){
            $("#notif").html(msg);
        }
		});
		var waktu = setTimeout("cek()",3000);
		}

		$(document).ready(function(){
		cek();
		$("#pesan").click(function(){
        //ajax untuk menampilkan pesan yang belum terbaca
        $.ajax({
            url: "<?php echo base_url(); ?>ortu/notif",
            cache: false,
            success: function(msg){
                $("#konten-info").html(msg);
            }
        });

		});
		$("#content").click(function(){
        $("#info").hide();
        $("#pesan").css("background-color","#4B59a9");
        x = 1;
		});
		});
		</script>
    </head>
	
	<body>
		<!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="<?php echo base_url('index.php/c_home/beranda');?>" class="logo">
							<i class="icon-globe icon-c-logo"></i>
							<span><i class="md md-album">Ar-rafi'</i></span>
						</a>
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

                            <ul class="nav navbar-nav navbar-right pull-right">
							<?php if ($this->session->userdata('kode_group') == 13) { ?>
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true" id="pesan">
                                        <i class="icon-bell"></i> <span class="badge badge-xs badge-danger" id="notif"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg" id="konten-info">
                                        
                                    </ul>
                                </li>
							<?php } ?>
                                <!--<li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="icon-user-following"></i></a>
                                </li>-->
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
										<?php if ($this->session->userdata('kode_group') == 1) { ?>
											<img src="<?php echo base_url()?>assets/images/admin.jpg" alt="user-img" class="img-circle">
										<?php } else {?>
											<img src="<?php echo base_url()?>assets/images/user.jpg" alt="user-img" class="img-circle">
										<?php }?>
									</a>
                                    <ul class="dropdown-menu">
                                        <li>
											<a href="<?php echo base_url('c_home/get_profil');?>">
												<i class="icon-user m-r-5"></i> <?php echo $this->session->userdata['username']; ?>
											</a>
										</li>
                                        <li>
											<a href="<?php echo base_url('login/doLogout');?>">
												<i class="ti-power-off m-r-5"></i> Logout
											</a>
										</li>
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
							<li>
								<a href="<?php echo base_url('c_home/beranda');?>" class="waves-effect">
									<i class="ti-home"></i> <span class="cap"> beranda </span>
								</a>
							</li>

							<li>
								<a href="<?php echo base_url('admin/ubah_password');?>" class="waves-effect">
									<i class="icon-user"></i> <span class="cap"> ubah password </span>
								</a>
							</li>

							<?php if ($this->session->userdata('kode_group') == 1) { ?>
							<li>
								<a color="blue" class="waves-effect">
								<span class="cap">Admin</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('admin/kelola_user');?>" class="waves-effect">
									<i class="icon-people"></i> <span class="cap"> Kelola User </span>
								</a>
							</li>

							<li>
								<a href="<?php echo base_url('admin/kelola_modul');?>" class="waves-effect">
									<i class="ti-harddrives"></i> <span class="cap"> Kelola Modul </span>
								</a>
							</li>
							<li id="a_integrasi">
								<a id="integrasi" class="waves-effect">
									<i class="icon-puzzle"></i> <span class="cap">Integrasi</span><bnsp><i class="icon-arrow-right13"></i>
								</a>
							</li>

							<li>
								<a href="<?php echo base_url('admin/kelola_otoritas');?>" class="waves-effect">
									<i class="ti-lock"></i><span class="cap"> Kelola Otoritas </span>
								</a>
							</li>
							<?php } ?>
				
							<?php
							$tamp="";
							foreach($list_menu->result()as $row) { 
							if(($tamp<>$row->nama_group) && ($row->nama_group<>'Admin')){?>
							<li>
								<a color="blue" class="waves-effect">
								<span> <?php echo $row->nama_group;?> </span class="cap"><i title="Main pages"></i>
								</a>
							</li>
							<?php
								$tamp=$row->nama_group;
							}
							if($row->nama_group<>'Admin'){
						?>
							<li>
								<a href="<?php echo base_url($row->link);?>" class="waves-effect">
									<i class="ti-harddrive"></i><span class="cap"><?php echo ' '.$row->nama_modul;?></span>
								</a>
							</li>
							<?php }} ?>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- Left Sidebar End -->
						
			<?php 
				$this->load->view($konten);
			?>

			<footer class="footer text-right">
				<center>Copyright &copy; 2016 Ar-rafi'</center>
            </footer>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">User Online</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
					<?php
						foreach($list_online->result()as $row) { ?>
                        <li class="list-group-item">
                            <a>
                                <div class="avatar">
                                    <img src="<?php echo base_url()?>assets/images/online.png" alt="">
                                </div>
                                <span class="name"><?php echo $row->username;?></span>
                                <i class="fa fa-circle online"></i>
                            </a>
							<span class="clearfix"></span>	
                        </li>
					<?php } ?>
                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->
	
	</body>
	
	<script>
		var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    
    <script src="<?php echo base_url()?>assets/js/detect.js"></script>
    <script src="<?php echo base_url()?>assets/js/fastclick.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url()?>assets/js/waves.js"></script>
    <script src="<?php echo base_url()?>assets/js/wow.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/jquery.core.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.app.js"></script>
	<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>assets/js/dataTables.bootstrap.min.js"></script>
	
	<!-- Enkripsi md5 Javascript  -->
	<script src="<?php echo base_url()?>assets/js/md5.js"></script>
	
	<script src="<?php echo base_url('assets/js/pa.js');?>" type="text/javascript"></script>

    <script src="<?php echo base_url()?>assets/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/morris/morris.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery-knob/jquery.knob.js"></script>	
	<script src="<?php echo base_url()?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/multiselect/js/jquery.multi-select.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
	
	<!-- Table  -->
	<script src="<?php echo base_url()?>assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/tiny-editable/numeric-input-example.js"></script>    
	<script src="<?php echo base_url()?>assets/pages/datatables.editable.init.js"></script>
	<script src="<?php echo base_url()?>assets/pages/jquery.dashboard.js"></script>
	
	<!-- FooTable  -->
    <script src="<?php echo base_url('assets/plugins/footable/js/footable.all.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap-validator/dist/js/bootstrap-validator.min.js" type="text/javascript');?>"></script>
    <script src="<?php echo base_url('assets/plugins/parsleyjs/dist/parsley.min.js" type="text/javascript');?>"></script>
    <script src="<?php echo base_url('assets/plugins/parsleyjs/src/i18n/id.js" type="text/javascript');?>"></script>
	
	<!-- FooTable Example  -->
    <script src="<?php echo base_url('assets/pages/jquery.footable.js');?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery.steps/build/jquery.steps.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-validation/dist/jquery.validate.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/pages/jquery.wizard-init.js');?>" type="text/javascript"></script>
	
	<!-- Form Picker  -->
    <script src="<?php echo base_url('assets/plugins/moment/moment.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/switchery/dist/switchery.min.js');?>"></script>
	
	<!-- Sweet-Alert  -->
   
    <script src="<?php echo base_url('assets/pages/modal.js');?>"></script>

    <script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.counter').counterUp({
				delay: 100,
                time: 1200
            });
            $(".knob").knob();
        });
		
		jQuery(document).ready(function() {

                //advance multiselect start
                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });
	            
	            //Bootstrap-TouchSpin
	            $(".vertical-spin").TouchSpin({
		            verticalbuttons: true,
		            verticalupclass: 'ion-plus-round',
		            verticaldownclass: 'ion-minus-round'
		        });
		        var vspinTrue = $(".vertical-spin").TouchSpin({
		            verticalbuttons: true
		        });
		        if (vspinTrue) {
		            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
		        }
		
		        $("input[name='demo1']").TouchSpin({
		            min: 0,
		            max: 100,
		            step: 0.1,
		            decimals: 2,
		            boostat: 5,
		            maxboostedstep: 10,
		            postfix: '%'
		        });
		        $("input[name='demo2']").TouchSpin({
		            min: -1000000000,
		            max: 1000000000,
		            stepinterval: 50,
		            maxboostedstep: 10000000,
		            prefix: '$'
		        });
		        $("input[name='demo3']").TouchSpin();
		        $("input[name='demo3_21']").TouchSpin({
		            initval: 40
		        });
		        $("input[name='demo3_22']").TouchSpin({
		            initval: 40
		        });
		
		        $("input[name='demo5']").TouchSpin({
		            prefix: "pre",
		            postfix: "post"
		        });
		        $("input[name='demo0']").TouchSpin({});
		        
		        
		        //Bootstrap-MaxLength
		        $('input#defaultconfig').maxlength()
		        
		        $('input#thresholdconfig').maxlength({
                threshold: 20
            });

            $('input#moreoptions').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger"
            });

            $('input#alloptions').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger",
                separator: ' out of ',
                preText: 'You typed ',
                postText: ' chars available.',
                validate: true
            });

            $('textarea#textarea').maxlength({
                alwaysShow: true
            });

            $('input#placement') .maxlength({
                    alwaysShow: true,
                    placement: 'top-left'
                });
				
			$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
		
			$(document).ready(function() {
				$('#datatable').dataTable();
			});
		});
    </script>
	
	<script>
		jQuery(document).ready(function() {

                // Time Picker
                jQuery('#timepicker1').timepicker({
                    showMeridian : false
                });

                jQuery('#timepicker3').timepicker({
                    showMeridian : false
                });

                jQuery('#timepicker2').timepicker({
                    showMeridian : false
                });
                jQuery('#timepicker4').timepicker({
                    showMeridian : false
                });
                                
                // Date Picker
                jQuery('#datepicker').datepicker();

                jQuery('#tgl_awal').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tgl_akhir').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_edit').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_mulai_buat_ppdb').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_terima').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tgl_lahir').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_selesai_buat_ppdb').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_mulai_edit_ppdb').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_selesai_edit_ppdb').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_mulai_buat_daftar_ulang').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });                

                jQuery('#tanggal_selesai_buat_daftar_ulang').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_mulai_edit_daftar_ulang').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_selesai_edit_daftar_ulang').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_mulai_buat_pengambilan_ijazah').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });                

                jQuery('#tanggal_selesai_buat_pengambilan_ijazah').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_mulai_edit_pengambilan_ijazah').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_selesai_edit_pengambilan_ijazah').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });
                
                jQuery('#tanggal_mulai_buat_her_registrasi').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });                

                jQuery('#tanggal_selesai_buat_her_registrasi').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_mulai_edit_her_registrasi').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_selesai_edit_her_registrasi').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal__edit_seleksi').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_mulai_buat_buku_seragam').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });                

                jQuery('#tanggal_selesai_buat_buku_seragam').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_mulai_edit_buku_seragam').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                jQuery('#tanggal_selesai_edit_buku_seragam').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "yyyy-mm-dd"
                });

                $('#check-minutes').click(function(e){
                    // Have to stop propagation here
                    e.stopPropagation();
                    $("#single-input").clockpicker('show')
                            .clockpicker('toggleView', 'minutes');
                });
                
                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
		});
    </script>
	
	<script>
           $(document).ready(function() {
               $('#dataTables-example').DataTable({
                   responsive: true,
               });
           });
    </script>

    <script>
            $(document).ready(function() {
                $('#dataTables-example100').DataTable({
                    responsive: true,
                });
            });
	</script>
    
	<script>
           $(document).ready(function() {
                $('#dataTables-example12').DataTable({
                    responsive: true,
                });
            });
	</script>
     
	<script>
            $(document).ready(function() {
                $('#dataTables-example13').DataTable({
                    responsive: true,
                });
            });
    </script>
	
	<script>
		$(document).ready(function() {
            $('form').parsley();
		});
    </script>
	
	<script>
            jQuery(document).ready(function() {
                // Select2
                $(".select2").select2();
                
                $(".select2-limiting").select2({
                  maximumSelectionLength: 2
                });
                
				$('.selectpicker').selectpicker();
                $(":file").filestyle({input: false});

                $('input#length').maxlength({
                    alwaysShow: true,
                    warningClass: "label label-success",
                    limitReachedClass: "label label-danger"
                });

                $('textarea#alamat').maxlength({
                    alwaysShow: true
                });
			});
	var clicks = 0;
	$( "body" ).on( "click", "a#integrasi", function() {
		if(clicks == 0){
            $("li#a_integrasi").append('<a id="integrasi1" href="<?php echo base_url('admin/tambah_integrasi');?>" class="waves-effect"><i class=""></i> <span>Tambah Integrasi</span></a><a id="integrasi2" href="<?php echo base_url('admin/kelola_integrasi');?>" class="waves-effect"><i class=""></i> <span class="cap">Kelola Integrasi</span></a>');
            clicks++;
        }else{
            $('a#integrasi1').remove();
			$('a#integrasi2').remove();
            clicks--;
        }
	});
    </script>
	
</html>