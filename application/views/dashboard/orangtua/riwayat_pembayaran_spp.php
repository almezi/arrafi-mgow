<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$username = $this->session->userdata('username');
	$password = $this->session->userdata('password');
	if (empty($username) && empty($password)) {
		echo "Silakan login terlebih dahulu";
	} else {
		$privilege = $this->session->userdata('privilege');

		if ($privilege=='Orang Tua') {
			?>

            <!-- ============================================================== -->
            <!-- Riwayat Pembayaran -->
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
                                        <a href="#">SPP Bulanan</a>
                                    </li>
                                    <li>
                                        <a href="#">Riwayat Pembayaran</a>
                                    </li>
                                    <li class="active">
                                        Lihat Riwayat Pembayaran
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
                                    
                                    <table
                                        id="demo-foo-filtering"
                                        data-toggle="table"
                                        class="table table-striped toggle-circle m-b-0"
                                        data-page-size="9">
                                        <thead>
                                            <tr>
                                                <th data-toggle="id">No</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Total Bayar</th>
                                                <th>Jumlah Bayar</th>
                                                <th>Sisa Bayar</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-sm-6 text-xs-center">
                                                    <div class="form-group">
                                                        <label class="control-label m-r-5">Status</label>
                                                        <select id="demo-foo-filter-status" class="form-control input-sm">
                                                            <option value="">Lihat Semua</option>
                                                            <option value="lunas">Lunas</option>
                                                            <option value="kredit">Kredit</option>
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
                                                foreach ($data_bayar as $key => $value) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($value->tanggal_bayar));?></td>
                                                    <td><?php echo $value->total_bayar;?></td>
                                                    <td><?php echo $value->jumlah_bayar;?></td>
                                                    <td><?php echo $value->sisa_bayar;?></td>
                                                    <td>
                                                        <?php
                                                            $status = $value->status;
                                                            if ($status=='Lunas') {
                                                                ?><span class="label label-table label-success">Lunas</span><?php
                                                            } else if ($status=='Kredit'){
                                                                ?><span class="label label-table label-purple">Kredit</span><?php
                                                            } else {
                                                                ?><span class="label label-table label-danger">Belum</span><?php
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                            ?>  
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">
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