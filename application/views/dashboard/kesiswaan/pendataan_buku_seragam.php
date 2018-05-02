<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$username = $this->session->userdata('username');
	$password = $this->session->userdata('password');
	if (empty($username) && empty($password)) {
		echo "Silakan login terlebih dahulu";
	} else {
		$privilege = $this->session->userdata('privilege');
		if ($privilege=='Tata Usaha Bagian Kesiswaan') {
			?>

<!-- ============================================================== -->
<!-- Lihat Jadwal PPDB -->
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
                                        <a href="#">Her Registrasi</a>
                                    </li>
                                    <li>
                                        <a href="#">Buku & Seragam</a>
                                    </li>
                                    <li class="active">
                                        Pendataan
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

                                    <?php
                                        $attributes = array(
                                            'id' => 'buat_jadwal_ppdb',
                                            'enabled' => TRUE,
                                            'class' => 'btn btn-default waves-effect waves-light'
                                        );

                                        echo anchor('Her_Registrasi_C/informasikan_pengambilan_buku_seragam','Informasikan',$attributes);
                                    ?>
                                    <table id="demo-foo-filtering"
                                    data-toggle="table"
                                    data-toolbar="#buat_jadwal_ppdb" class="table table-striped toggle-circle m-b-0" data-page-size="15">
                                        <thead>
                                            <tr>
                                                <th data-toggle="id">No</th>
                                                <th>NIS</th>
                                                <th>NISN</th>
                                                <th>Nama Siswa</th>
                                                <th>No Telepon</th>
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
                                                            <option value="sudah">Sudah</option>
                                                            <option value="belum">Belum</option>
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
                                                foreach ($data_jadwal as $key => $value) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $value->nis;?></td>
                                                    <td><?php echo $value->nisn;?></td>
                                                    <td><?php echo $value->nama_siswa;?></td>
                                                    <td><?php echo $value->no_telp;?></td>
                                                    <td>
                                                        <?php
                                                            $status = $value->status;
                                                            if ($status=='Sudah') {
                                                                ?><span class="label label-table label-success">Sudah</span><?php
                                                            } else {
                                                                ?><span class="label label-table label-danger">Belum</span><?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php
                                                                if ($status!='Sudah') {
                                                                    $data = array(
                                                                        'title' => 'Konfirmasi'
                                                                    );

                                                                    echo anchor('Her_Registrasi_C/konfirmasi_pendataan_buku_seragam/'.$value->nis,'<i style="color:#34d3eb;" class="fa fa-check fa-2x fa-fw"></i><span></span>',$data);

                                                                    $data = array(
                                                                        'title' => 'Informasikan'
                                                                    );

                                                                    echo anchor('Her_Registrasi_C/informasikan_pendataan_buku_seragam/'.$value->no_telp,'<i style="color:#ffbd4a;" class="fa fa-info fa-2x fa-fw"></i><span></span>',$data);
                                                                }
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
                                                <td colspan="7">
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