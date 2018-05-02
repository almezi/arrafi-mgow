<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$username = $this->session->userdata('username');
	$password = $this->session->userdata('password');
	if (empty($username) && empty($password)) {
		echo "Silakan login terlebih dahulu";
	} else {
		$privilege = $this->session->userdata('privilege');

		if ($privilege=='Panitia') {
			?>

<!-- ============================================================== -->
<!-- Lihat Nilai OPS -->
<!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">{page}</h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#">Seleksi</a>
                                    </li>
                                    <li>
                                        <a href="#">Hasil</a>
                                    </li>
                                    <li class="active">
                                        Rekap
                                    </li>
                                </ol>
                            </div>
                        </div>

                            
                        <!--Custom Toolbar-->
                        <!--===================================================-->
                        <?php echo $this->session->flashdata('pesan');?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>{toolbar}</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        &nbsp;
                                    </p>
                                                        
                                    <table id="demo-foo-filtering" data-toggle="table" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Pendaftaran</th>
                                                <th>OPS</th>
                                                <th>OK</th>
                                                <th>Psikotes</th>
                                                <th>Wawancara</th>
                                                <th>Status</th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-sm-6 text-xs-center">
                                                    <div class="form-group">
                                                        <label class="control-label m-r-5">Status</label>
                                                        <select id="demo-foo-filter-status" class="form-control input-sm">
                                                            <option value="">Lihat Semua</option>
                                                            <option value="diterima">Diterima</option>
                                                            <option value="dipertimbangkan">Dipertimbangkan</option>
                                                            <option value="ditolak">Ditolak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-xs-center text-right">
                                                    <div class="form-group">
                                                        <input id="demo-foo-search" type="text" placeholder="Search" class="form-control input-sm" autocomplete="on">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach ($data_nilai as $key => $value) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $value->no_pendaftaran;?></td>
                                                    <td><?php echo $value->ops;?></td>
                                                    <td><?php echo $value->ok;?></td>
                                                    <td>
                                                        <?php 
                                                            $psikotes = $value->psikotes;

                                                            if ($psikotes=='') {

                                                            $data = array(
                                                                'title' => 'Matang'
                                                            );

                                                            echo anchor('Seleksi_C/hasil_psikotes/Ya/'.$value->no_pendaftaran,'<i style="color:#34d3eb;" class="fa fa-check fa-2x fa-fw"></i><span></span>',$data);
                                                            $data = array(
                                                                'title' => 'Tidak Matang'
                                                            );

                                                            echo anchor('Seleksi_C/hasil_psikotes/Tidak/'.$value->no_pendaftaran,'<i style="color:#f05050;" class="fa fa-close fa-2x fa-fw"></i><span></span>',$data);
                                                            } else {
                                                                echo 'Matang';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                         <?php 
                                                            $wawancara = $value->wawancara;

                                                            if ($wawancara=='') {
                                                                $data = array(
                                                                    'title' => 'Siap'
                                                                );

                                                                echo anchor('Seleksi_C/hasil_wawancara/Siap/'.$value->no_pendaftaran,'<i style="color:#34d3eb;" class="fa fa-check fa-2x fa-fw"></i><span></span>',$data);
                                                                $data = array(
                                                                    'title' => 'Tidak Siap'
                                                                );

                                                                echo anchor('Seleksi_C/hasil_wawancara/Tidak/'.$value->no_pendaftaran,'<i style="color:#f05050;" class="fa fa-close fa-2x fa-fw"></i><span></span>',$data);
                                                            } else {
                                                                echo $wawancara;
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $status = $value->status;
                                                            if ($status=='Diterima') {
                                                                ?><span class="label label-table label-success">Diterima</span><?php
                                                            } else if ($status=='Dipertimbangkan'){
                                                                ?><span class="label label-table label-purple">Dipertimbangkan</span><?php
                                                            } else {
                                                                ?><span class="label label-table label-danger">Ditolak</span><?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php
                                                                $data = array(
                                                                    'title' => 'Diterima'
                                                                );

                                                                echo anchor('Seleksi_C/hasil_seleksi/Diterima/'.$value->no_pendaftaran,'<i style="color:#34d3eb;" class="fa fa-check fa-2x fa-fw"></i><span></span>',$data);
                                                            ?>
                                                            
                                                            <?php
                                                                $data = array(
                                                                    'title' => 'Dipertimbangkan'
                                                                );

                                                                echo anchor('Seleksi_C/hasil_seleksi/Dipertimbangkan/'.$value->no_pendaftaran,'<i style="color:#ffbd4a;" class="fa fa-question fa-2x fa-fw"></i><span></span>',$data);
                                                            ?>

                                                            <?php
                                                                $data = array(
                                                                    'title' => 'Ditolak'
                                                                );

                                                                echo anchor('Seleksi_C/hasil_seleksi/Ditolak/'.$value->no_pendaftaran,'<i style="color:#f05050;" class="fa fa-close fa-2x fa-fw"></i><span></span>',$data);
                                                            ?>
                                                        </center>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                            ?>  
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="13">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-split m-t-30 m-b-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			<?php
		} else {
			echo "Maaf. Anda Tidak Dapat Mengakses Halaman Ini";
		}
	}
?>