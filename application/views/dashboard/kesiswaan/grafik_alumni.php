<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$username = $this->session->userdata('username');
	$password = $this->session->userdata('password');
	if (empty($username) && empty($password)) {
		echo "Silakan login terlebih dahulu";
	} else {
		$privilege = $this->session->userdata('privilege');

		if ($privilege=='Tata Usaha Bagian Kesiswaan'||$privilege=='Kepala Sekolah') {
			?>
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
                                <h4 class="page-title">Grafik Alumni</h4>
                                <p class="text-muted page-title-alt">Selamat Datang <?php echo $privilege;?></p>
                            </div>
                        </div>

                        <?php
                            foreach ($data_alumni as $key => $value) {
                                $jumlah_alumni = $value->jumlah_alumni;
                                ?>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-school text-primary"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo $value->tujuan_smpn;?></h2>
                                    <div class="text-muted m-t-5">SMP Negeri</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-school text-pink"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo $value->tujuan_smps;?></h2>
                                    <div class="text-muted m-t-5">SMP Swasta</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-school text-info"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo $value->tujuan_mtsn;?></h2>
                                    <div class="text-muted m-t-5">MTS Negeri</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-school text-custom"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?php echo $value->tujuan_mtss;?></h2>
                                    <div class="text-muted m-t-5">MTS Swasta</div>
                                </div>
                            </div>
                        </div>


                        

                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0">&nbsp;</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="font-600">Mudah masuk sekolah lanjutan favorite atau unggulan <span class="text-primary pull-right"> <?php echo ceil(((($value->persepsi_1)/$jumlah_alumni) * 100));?>%</span></p>
                                            <div class="progress m-b-30">
                                              <div class="progress-bar progress-bar-primary progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo ceil(((($value->persepsi_1)/$jumlah_alumni) * 100));?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php
                                                    echo ceil(((($value->persepsi_1)/$jumlah_alumni) * 100));
                                                ?>%">
                                              </div><!-- /.progress-bar .progress-bar-danger -->
                                            </div><!-- /.progress .no-rounded -->
                                            
                                            <p class="font-600">Berprestasi saat UN <span class="text-pink pull-right"> <?php echo ceil(((($value->persepsi_2)/$jumlah_alumni) * 100));?>%</span></p>
                                            <div class="progress m-b-30">
                                              <div class="progress-bar progress-bar-pink progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo ((($value->persepsi_2)/$jumlah_alumni) * 100);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ((($value->persepsi_2)/$jumlah_alumni) * 100);?>%">
                                              </div><!-- /.progress-bar .progress-bar-pink -->
                                            </div><!-- /.progress .no-rounded -->
                                            
                                            <p class="font-600">Sekolah lanjutan sekarang sesuai dengan keinginan <span class="text-info pull-right"><?php echo ceil(((($value->persepsi_3)/$jumlah_alumni) * 100));?>%</span></p>
                                            <div class="progress m-b-30">
                                              <div class="progress-bar progress-bar-info progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo ((($value->persepsi_3)/$jumlah_alumni) * 100);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ((($value->persepsi_3)/$jumlah_alumni) * 100);?>%">
                                              </div><!-- /.progress-bar .progress-bar-info -->
                                            </div><!-- /.progress .no-rounded -->
                                            
                                            <p class="font-600">Proses belajar mengajar efektif dan aplikati <span class="text-warning pull-right"><?php echo ceil(((($value->persepsi_4)/$jumlah_alumni) * 100));?>%</span></p>
                                            <div class="progress m-b-30">
                                              <div class="progress-bar progress-bar-warning progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo ((($value->persepsi_4)/$jumlah_alumni) * 100);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ((($value->persepsi_4)/$jumlah_alumni) * 100);?>%">
                                              </div><!-- /.progress-bar .progress-bar-warning -->
                                            </div><!-- /.progress .no-rounded -->    
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="widget-chart text-center">
                                                <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#fb6d9d" value="
                                                    <?php
                                                        $l = $value->jekel_l;
                                                        $p = $value->jekel_p;
                                                        if ($l>$p) {
                                                            echo ceil(($l/$jumlah_alumni) * 100);
                                                        } else {
                                                            echo ceil(($p/$jumlah_alumni) * 100);
                                                        }
                                                    ?>" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"/>

                                                <ul class="list-inline m-t-15">
                                                    <li>
                                                        <h5 class="text-muted m-t-20">Laki - Laki</h5>
                                                        <h4 class="m-b-0"><?php echo $l;?></h4>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-muted m-t-20">Perempuan</h5>
                                                        <h4 class="m-b-0"><?php echo $p;?></h4>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <?php
                            }
                        ?>
                    </div> <!-- container -->
                </div> <!-- content -->
            <?php
		} else {
			echo "Maaf. Anda Tidak Dapat Mengakses Halaman Ini";
		}
	}
?>