<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
    $username = $this->session->userdata('username');
    $password = $this->session->userdata('password');
    $privilege = $this->session->userdata('privilege');

    if (empty($username) && empty($password)) {
        echo "Silakan login untuk mengakses halaman ini";
    } else {
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Proyek Akhir Hani Fildzah Ghassani">
        <meta name="author" content="Hani Fildzah Ghassani">

        <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.ico');?>">

        <title>SD Ar-Rafi'</title>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboard/plugins/jquery.steps/demo/css/jquery.steps.css');?>" />
        <link href="<?php echo base_url('assets/dashboard/plugins/bootstrap-table/dist/bootstrap-table.min.css');?>" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url('assets/dashboard/plugins/select2/select2.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/plugins/bootstrap-select/dist/css/bootstrap-select.min.css');?>" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/plugins/morris/morris.css');?>">

        <link href="<?php echo base_url('assets/dashboard/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/core.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/components.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/icons.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/pages.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/css/responsive.css');?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboard/fonts/font-awesome/css/font-awesome.min.css');?>">

        <!--Form Picker -->
        <link href="<?php echo base_url('assets/dashboard/plugins/timepicker/bootstrap-timepicker.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/dashboard/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>" rel="stylesheet">
        

        <!-- Plugins css-->
        <link href="<?php echo base_url('assets/dashboard/plugins/switchery/dist/switchery.min.css');?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/dashboard/plugins/select2/select2.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/dashboard/plugins/bootstrap-select/dist/css/bootstrap-select.min.css');?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/dashboard/plugins/bootstrapvalidator/dist/css/bootstrapValidator.min.css');?>" rel="stylesheet" />

        <link href="<?php echo base_url('assets/dashboard/plugins/sweetalert/dist/sweetalert.css');?>" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url('assets/dashboard/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css');?>" rel="stylesheet" />

        <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/plugins/jquery-datatables-editable/datatables.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/plugins/magnific-popup/dist/magnific-popup.css');?>" />


        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url('assets/dashboard/js/modernizr.min.js');?>"></script>
    </head>
    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo">
                            <i class="icon-layers icon-c-logo"></i>
                            <span>SD Ar-Rafi'</span>
                        </a>
                    </div>
                </div>

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
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url('assets/dashboard/images/users/no-image.jpg');?>" alt="user-img" class="img-circle">
                                             </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <?php
                                                if ($privilege=='Pendaftar') {
                                                    echo anchor('Pendaftar_C/profile','<i class="ti-user m-r-5"></i> Profile');
                                                }
                                            ?>
                                        </li>
                                        <li>
                                            <?php echo anchor('Authentication_C/lockscreen','<i class="ti-lock m-r-5"></i> Lock Screen');?>
                                        </li>
                                        <li>
                                            <?php echo anchor('welcome/setting','<i class="ti-settings m-r-5"></i> Settings');?>
                                        </li>
                                        <li>  
                                            <?php echo anchor('Authentication_C/logout','<i class="ti-power-off m-r-5"></i> Logout');?>
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
                            <li class="text-muted menu-title">Navigasi</li>
                            <?php
                                if ($privilege=='Panitia' || $privilege=='Pendaftar') {
                                    ?>
                                    <li class="has_sub">
                                        <a href="#" class="waves-effect"><i class="ti-crown"></i><span> Registrasi </span> </a>
                                        <ul class="list-unstyled">
                                            <?php
                                                if ($privilege=='Panitia') {
                                                    ?>
                                                        <li>
                                                            <?php echo anchor('Registrasi_C/lihat_jadwal_ppdb','Jadwal PPDB');?>
                                                        </li>
                                                        <li>
                                                            <?php echo anchor('Registrasi_C/lihat_jadwal_seleksi','Jadwal Seleksi');?>
                                                        </li>
                                                        <li>
                                                            <?php echo anchor('Registrasi_C/lihat_pembayaran_psikotes','Pembayaran Psikotes');?>
                                                        </li>
                                                    <?php
                                                } else if($privilege=='Pendaftar'){
                                                    ?>
                                                        <li>
                                                            <a href="#" class="waves-effect"><span> Formulir </span> </a>
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <?php echo anchor('Registrasi_C/form_ket_siswa','Data Siswa');?>
                                                                </li>
                                                                <li>
                                                                    <?php echo anchor('Registrasi_C/form_ket_ortu','Data Orang Tua');?>
                                                                </li>
                                                                <li>
                                                                    <?php echo anchor('Registrasi_C/form_ket_wali','Data Wali <span class="label label-default pull-right">opsional</span>');?>
                                                                </li>
                                                                <li>
                                                                    <?php echo anchor('Registrasi_C/form_ket_asal','Data Asal Mula');?>
                                                                </li>
                                                                <li>
                                                                    <?php echo anchor('Registrasi_C/lihat_data_formulir','Lihat Data');?>
                                                                </li>
                                                            </ul>
                                                        </li>

                                                        <li>
                                                            <?php echo anchor('Registrasi_C/form_bayar_psikotes','Pembayaran');?>
                                                        </li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </li>

                                    <li class="has_sub">
                                        <a href="#" class="waves-effect"><i class="ti-pencil-alt"></i><span> Seleksi </span> </a>
                                        <ul class="list-unstyled">
                                            <?php
                                                if ($privilege=='Panitia') {
                                                    ?>
                                                        <li>
                                                            <a href="#" class="waves-effect"><span>Hasil</span></a>
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <?php echo anchor('Seleksi_C/lihat_nilai_ops',' OPS ');?>
                                                                </li>
                                                                <li>
                                                                    <?php echo anchor('Seleksi_C/lihat_nilai_ok',' OK ');?>
                                                                </li>
                                                                <li>
                                                                    <?php echo anchor('Seleksi_C/lihat_nilai_rekap',' Rekap ');?>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <?php echo anchor('Seleksi_C/lihat_pengumuman_seleksi',' Pengumuman ');?>
                                                        </li>
                                                    <?php
                                                } else if($privilege=='Pendaftar'){
                                                    ?>
                                                        <li><a href="Seleksi_C/pengumuman_seleksi">Pengumuman</a></li>
                                                    <?php
                                                }
                                            ?>`
                                        </ul>
                                    </li>
                                    <?php
                                }
                            ?>

                            
                            <?php
                                if ($privilege=='Orang Tua' || $privilege=='Tata Usaha Bagian Keuangan' || $privilege=='Tata Usaha Bagian Kesiswaan') {
                                    ?>
                                    <li class="has_sub">
                                        <a href="#" class="waves-effect"><i class="ti-write"></i><span> Her-Registrasi </span> </a>
                                        <ul class="list-unstyled">
                                            <?php
                                                if ($privilege=='Tata Usaha Bagian Kesiswaan') {
                                                    ?>
                                                        <li>
                                                            <?php echo anchor('Her_Registrasi_C/lihat_jadwal_her_registrasi','Jadwal');?>
                                                        </li>

                                                        <li>
                                                            <?php echo anchor('Her_Registrasi_C/pendataan_buku_seragam','Buku & Seragam');?>
                                                        </li>
                                                    <?php
                                                }
                                                if ($privilege=='Tata Usaha Bagian Keuangan') {
                                                    ?>
                                                        <li>
                                                            <?php echo anchor('Her_Registrasi_C/lihat_data_pembayaran_her_registrasi','Data Pembayaran');?>
                                                        </li>
                                                        <li>
                                                            <?php echo anchor('Her_Registrasi_C/unggah_pembayaran_her_registrasi','Pembayaran');?>
                                                        </li>
                                                    <?php           
                                                } else if($privilege=='Orang Tua'){
                                                    ?>
                                                        <li>
                                                            <?php echo anchor('Her_Registrasi_C/lihat_jadwal_her_registrasi','Jadwal');?>
                                                        </li>
                                                        <li>
                                                            <?php echo anchor('Her_Registrasi_C/unggah_pembayaran_her_registrasi','Pembayaran');?>
                                                        </li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                    

                                    <?php
                                        if ($privilege=='Orang Tua' || $privilege=='Tata Usaha Bagian Keuangan') {
                                            ?>
                                    <li class="has_sub">
                                        <a href="#" class="waves-effect"><i class="ti-credit-card"></i><span> SPP Bulanan </span> </a>
                                        <ul class="list-unstyled">
                                            <?php
                                                if ($privilege=='Tata Usaha Bagian Keuangan') {
                                                    ?>
                                                        <li>
                                                            <?php echo anchor('SPP_Bulanan_C/lihat_data_siswa','Data Siswa');?>
                                                        </li>

                                                        <li>
                                                            <?php echo anchor('SPP_Bulanan_C/form_bayar_spp','Bayar');?>
                                                        </li>

                                                        <li>
                                                            <?php echo anchor('SPP_Bulanan_C/lihat_data_pembayaran','Pembayaran SPP');?>
                                                        </li>
                                                    <?php           
                                                } else if($privilege=='Orang Tua'){
                                                    ?>
                                                        <li>
                                                            <?php echo anchor('SPP_Bulanan_C/form_bayar_spp','Pembayaran');?>
                                                        </li>
                                                        <li>
                                                            <?php echo anchor('SPP_Bulanan_C/riwayat_pembayaran','Riwayat Pembayaran');?>
                                                        </li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                }
                            ?>

                            <?php
                                if ($privilege=='Panitia' || $privilege=='Orang Tua' || $privilege=='Tata Usaha Bagian Keuangan') {
                                    ?>
                                    <li class="has_sub">
                                        <a href="#" class="waves-effect"><i class="ti-notepad"></i><span> Daftar Ulang </span> </a>
                                        <ul class="list-unstyled">
                                            <?php
                                                if ($privilege=='Panitia' || $privilege=='Tata Usaha Bagian Keuangan') {
                                                    ?>
                                                        <li>
                                                            <?php echo anchor('Daftar_Ulang_C/lihat_jadwal_daftar_ulang','Jadwal');?>
                                                        </li>
                                                        <?php
                                                            if ($privilege=='Tata Usaha Bagian Keuangan') {
                                                                ?>
                                                                    <li>
                                                                        <?php echo anchor('Daftar_Ulang_C/lihat_data_pembayaran_daftar_ulang','Pembayaran');?>
                                                                    </li>

                                                                    <li>
                                                                        <?php echo anchor('Daftar_Ulang_C/unggah_pembayaran_daftar_ulang','Unggah Pembayaran');?>
                                                                    </li>
                                                                <?php
                                                            }
                                                        
                                                            if ($privilege=='Panitia') {
                                                                ?>
                                                                    <li>
                                                                        <?php echo anchor('Daftar_Ulang_C/lihat_dokumen_daftar_ulang','Kelengkapan');?>
                                                                    </li>
                                                                <?php
                                                            }
                                                } else if($privilege=='Orang Tua'){
                                                    ?>
                                                        <li>
                                                            <?php echo anchor('Daftar_Ulang_C/unggah_dokumen_persyaratan','Kelengkapan');?>
                                                        </li>
                                                        <li>
                                                            <?php echo anchor('Daftar_Ulang_C/unggah_pembayaran_daftar_ulang','Pembayaran');?>
                                                        </li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            ?>

                            <?php
                                if ($privilege=='Operator' || $privilege=='Orang Tua') {
                                    ?>
                                    <li class="has_sub">
                                        <a href="#" class="waves-effect"><i class="ti-harddrive"></i><span> NISN </span> </a>
                                        <ul class="list-unstyled">
                                            <li><?php echo anchor('Nisn_C/lihat_data_nisn','Berkas NISN');?></li>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            ?>

                            <?php
                                if ($privilege=='Tata Usaha Bagian Kesiswaan' || $privilege=='Kepala Sekolah' || $privilege=='Orang Tua') {
                                    ?>
                                    <li class="has_sub">
                                        <a href="#" class="waves-effect"><i class="ti-id-badge"></i><span> Alumni </span> </a>
                                        <ul class="list-unstyled">
                                            <?php
                                                if ($privilege=='Tata Usaha Bagian Kesiswaan' || $privilege=='Kepala Sekolah'){
                                                    ?>
                                            <li>
                                                <a href="#" class="waves-effect"><span> Ijazah </span> </a>
                                                <ul class="list-unstyled">
                                                    <li><?php echo anchor('Alumni_C/lihat_jadwal_pengambilan_ijazah','Jadwal');?></li>
                                                    <li><?php echo anchor('Alumni_C/lihat_pengambilan_ijazah','Pengambilan');?></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="#" class="waves-effect"><span> Grafik </span> </a>
                                                <ul class="list-unstyled">
                                                    <li><?php echo anchor('Alumni_C/grafik_alumni','Alumni');?></li>
                                                </ul>
                                            </li>
                                                    <?php
                                                }
                                            ?>

                                            <?php
                                                if ($privilege=='Orang Tua') {
                                                    ?>
                                            <li><?php echo anchor('Alumni_C/form_pendataan_alumni','Pendataan Alumni');?></li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            ?>

                            <?php
                                if ($privilege=='Panitia') {
                                    ?>
                                    <?php
                                }
                            ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            <?php $this->load->view($content);?>            

                <footer class="footer text-right">
                    <?php echo date('Y');?> © Hani Fildzah Ghassani
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
        <script src="<?php echo base_url('assets/dashboard/js/jquery.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/detect.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/fastclick.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/jquery.slimscroll.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/jquery.blockUI.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/waves.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/wow.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/jquery.nicescroll.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/jquery.scrollTo.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/peity/jquery.peity.min.js');?>"></script>

        <!-- jQuery  -->
        <script src="<?php echo base_url('assets/dashboard/plugins/waypoints/lib/jquery.waypoints.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/counterup/jquery.counterup.min.js');?>"></script>



        <script src="<?php echo base_url('assets/dashboard/plugins/morris/morris.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/raphael/raphael-min.js');?>"></script>

        <script src="<?php echo base_url('assets/dashboard/plugins/jquery-knob/jquery.knob.js');?>"></script>

        <script src="<?php echo base_url('assets/dashboard/pages/jquery.dashboard.js');?>"></script>

        <script src="<?php echo base_url('assets/dashboard/js/jquery.core.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/js/jquery.app.js');?>"></script>


        <script src="<?php echo base_url('assets/dashboard/plugins/bootstrap-table/dist/bootstrap-table.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/pages/jquery.bs-table.js');?>"></script>

        <script src="<?php echo base_url('assets/dashboard/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js');?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/switchery/dist/switchery.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/multiselect/js/jquery.multi-select.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/dashboard/plugins/jquery-quicksearch/jquery.quicksearch.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/select2/select2.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/bootstrap-select/dist/js/bootstrap-select.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js');?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/dashboard/js/pa.js');?>" type="text/javascript"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>

        <script src="<?php echo base_url('assets/dashboard/plugins/jquery.steps/build/jquery.steps.min.js');?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/dashboard/plugins/jquery-validation/dist/jquery.validate.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/pages/jquery.wizard-init.js');?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/dashboard/plugins/moment/moment.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>

        <script src="<?php echo base_url('assets/dashboard/plugins/switchery/dist/switchery.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/select2/select2.min.js" type="text/javascript');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript');?>"></script>

        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url('assets/dashboard/plugins/sweetalert/dist/sweetalert.min.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/pages/jquery.sweet-alert.init.js');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/pages/modal.js');?>"></script>

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
            jQuery(document).ready(function() {
                // Select2
                $(".select2").select2();
                
                $(".select2-limiting").select2({
                  maximumSelectionLength: 2
                });
                
               $('.selectpicker').selectpicker();
                $(":file").filestyle({input: false});
                });


                $('input#length').maxlength({
                    alwaysShow: true,
                    warningClass: "label label-success",
                    limitReachedClass: "label label-danger"
                });

                $('textarea#alamat').maxlength({
                    alwaysShow: true
                });
        </script> 

        <!--FooTable-->
        <script src="<?php echo base_url('assets/dashboard/plugins/footable/js/footable.all.min.js');?>"></script>
        
        <script src="<?php echo base_url('assets/dashboard/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/bootstrap-validator/dist/js/bootstrap-validator.min.js" type="text/javascript');?>"></script>

        <script src="<?php echo base_url('assets/dashboard/plugins/parsleyjs/dist/parsley.min.js" type="text/javascript');?>"></script>
        <script src="<?php echo base_url('assets/dashboard/plugins/parsleyjs/src/i18n/id.js" type="text/javascript');?>"></script>

        <!--FooTable Example-->
        <script src="<?php echo base_url('assets/dashboard/pages/jquery.footable.js');?>"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>
    </body>
</html>
        <?php
    }
?>