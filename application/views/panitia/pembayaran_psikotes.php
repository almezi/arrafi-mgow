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
                                <h4 class="page-title">Laporan Administrasi Psikotes</h4>
                            </div>
                        </div>
                        <br>
                        <!--Custom Toolbar-->
                        <!--===================================================-->
                        <?php echo $this->session->flashdata('pesan');?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <p class="text-muted m-b-30 font-13">
                                        &nbsp;
                                    </p>

                                    <table id="demo-foo-filtering"
                                    data-toggle="table"
                                    data-toolbar="#buat_jadwal_ppdb" class="table table-striped toggle-circle m-b-0" data-page-size="9">
                                        <thead>
                                            <tr>
                                                <th data-toggle="id">No</th>
                                                <th>Pembayar</th>
                                                <th>Tanggal</th>
                                                <th>Total Bayar</th>
                                                <th>Jumlah Bayar</th>
                                                <th>Sisa Bayar</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
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
                                                foreach ($data_bayar as $key => $value) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td>
                                                    	<?php
                                                    		$pembayar = $value->no_pendaftaran;

                                                    		if ($pembayar=="") {
                                                    			echo $value->nis;
                                                    		} else {
                                                    			echo $pembayar;
                                                    		}
                                                    	?>
                                                    </td>
                                                    <td><?php echo date('d-m-Y',strtotime($value->tanggal_bayar));?></td>
                                                    <td><?php echo 'Rp. '.number_format($value->total_bayar,2,',','.');?></td>
                                                    <td><?php echo 'Rp. '.number_format($value->jumlah_bayar,2,',','.');?></td>
                                                    <td><?php echo 'Rp. '.number_format($value->sisa_bayar,2,',','.');?></td>
                                                    <td>
                                                        <?php
                                                            $status = $value->status_konfirmasi;
                                                            if ($status=='Sudah') {
                                                                ?><span class="label label-table label-success">Sudah</span><?php
                                                            } else {
                                                                ?><span class="label label-table label-danger">Belum</span><?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                    	<?php
                                                            $data = array(
                                                                'title' => 'Konfirmasi Pembayaran',
                                                                'name' => 'status_konfirmasi'
                                                            );

                                                            echo anchor('Registrasi_C/konfirmasi_pembayaran_psikotes/'.$value->id_bayar.'/'.$value->no_pendaftaran,'<i style="color:#34d3eb;" class="fa fa-check fa-2x fa-fw"></i><span></span>',$data);
                                                        ?>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                            ?>  
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="8">
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