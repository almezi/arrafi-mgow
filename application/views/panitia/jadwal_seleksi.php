<!-- ============================================================== -->
<!-- Lihat Jadwal Seleksi -->
<!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Jadwal Seleksi</h4>
                            </div>
                        </div>
						<br>
                        <!--Custom Toolbar-->
                        <!--===================================================-->
                        <?php echo $this->session->flashdata('pesan');?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
									<?php
                                        $attributes = array(
                                            'id' => 'buat_jadwal_seleksi',
                                            'enabled' => TRUE,
                                            'class' => 'btn btn-default waves-effect waves-light',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#buat_jadwal'
                                        );

                                        echo anchor('#','Buat Jadwal',$attributes);
                                    ?>
								
                                    <p class="text-muted m-b-30 font-13">
                                        &nbsp;
                                    </p>
									
                                    <table id="demo-foo-filtering"
                                    data-toggle="table"
                                    data-toolbar="#buat_jadwal_seleksi" class="table table-striped toggle-circle m-b-0" data-page-size="9">
                                        <thead>
                                            <tr>
                                                <th data-toggle="id">No</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal</th>
                                                <th>Waktu Mulai</th>
                                                <th>Waktu Selesai</th>
                                                <th>Ruangan</th>
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
                                                            <option value="terlaksana">Terlaksana</option>
                                                            <option value="berlangsung">Berlangsung</option>
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
                                                    <td><?php echo $value->nama_kegiatan;?></td>
                                                    <td><?php echo $value->keterangan;?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($value->tanggal));?></td>
                                                    <td><?php echo $value->waktu_mulai;?></td>
                                                    <td><?php echo $value->waktu_selesai;?></td>
                                                    <td><?php echo $value->nama_ruangan;?></td>
                                                    <td>
                                                        <?php
                                                            $status = $value->status;
                                                            if ($status=='Berlangsung') {
                                                                ?><span class="label label-table label-success">Berlangsung</span><?php
                                                            } else if ($status=='Terlaksana'){
                                                                ?><span class="label label-table label-purple">Terlaksana</span><?php
                                                            } else {
                                                                ?><span class="label label-table label-danger">Belum</span><?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
<?php  
														$attributes = array(
                                                                'title' => 'Edit Jadwal',
                                                                'class' => 'on-default remove-row',
                                                                'data-animation' => 'fadein',
                                                                'data-plugin' => 'custommodal',
                                                                'data-overlaySpeed' => 200,
                                                                'data-overlayColor' => '#36404a',
                                                                'data-confirm' => 'Apakah Anda ingin menghapus data ini?'
                                                            );
													 echo anchor('panitia/edit_jadwal_seleksi/'.$value->id_jadwal,' <i style="color: #29b6f6;" class="fa fa-pencil fa-2x fa-fw"></i> <span></span> ', $attributes);
													 ?>
                                                        <?php
                                                            $attributes = array(
                                                                'title' => 'Hapus Jadwal',
                                                                'class' => 'on-default remove-row',
                                                                'data-animation' => 'fadein',
                                                                'data-plugin' => 'custommodal',
                                                                'data-overlaySpeed' => 200,
                                                                'data-overlayColor' => '#36404a',
                                                                'data-confirm' => 'Apakah Anda ingin menghapus data ini?'
                                                            );

                                                            echo anchor('panitia/hapus_jadwal_seleksi/'.$value->id_jadwal,' <i style="color:#f05050" class="fa fa-trash-o fa-2x fa-fw"></i> <span></span> ', $attributes);
                                                        ?>
                                                    </td>
                                                </tr>
                                                    <?php
                                                }
                                            ?>  
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="9">
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



<!-- ============================================================== -->
<!-- Buat Jadwal Seleksi -->
<!-- ============================================================== -->

                <div id="buat_jadwal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" data-parsley-validate novalidate>
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <?php
                                $attributes = array(
                                    'method' => 'post',
                                    'role' => 'form',
                                    'data-toggle' => 'validator'
                                );

                                echo form_open('Registrasi_C/buat_jadwal_seleksi',$attributes);
                            ?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Buat Jadwal</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nama Kegiatan</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'nama_kegiatan',
                                                            'id' => 'nama_kegiatan',
                                                            'parsley-trigger' => 'change',
                                                            'required' => true
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Keterangan</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'rows' => '5',
                                                            'name' => 'keterangan',
                                                            'id' => 'keterangan',
                                                            'parsley-trigger' => 'change',
                                                            'required' => true
                                                        );

                                                        echo form_textarea($attributes);
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Tanggal</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'tanggal_mulai_buat_ppdb',
                                                            'name' => 'tanggal',
                                                            'parsley-trigger' => 'change',
                                                            'required' => true
                                                        );

                                                        echo form_input($attributes);
                                                    ?>
                                                    <span class="input-group-addon bg-custom b-0 text-white">
                                                        <i class="icon-calender"></i>
                                                    </span>
                                                </div>
                                            </div>
                                         </div> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Waktu Mulai</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="bootstrap-timepicker">
                                                        <?php
                                                            $attributes = array(
                                                                'id' => 'timepicker2',
                                                                'name' => 'waktu_mulai',
                                                                'class' => 'form-control',
                                                                'parsley-trigger' => 'change',
                                                                'required' => true
                                                            );

                                                            echo form_input($attributes);
                                                        ?>
                                                    </div>
                                                    <span class="input-group-addon bg-custom b-0 text-white">
                                                        <i class="icon-clock"></i>
                                                    </span>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Waktu Selesai</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="bootstrap-timepicker">
                                                        <?php
                                                            $attributes = array(
                                                                'id' => 'timepicker4',
                                                                'name' => 'waktu_selesai',
                                                                'class' => 'form-control',
                                                                'parsley-trigger' => 'change',
                                                                'required' => true
                                                            );

                                                            echo form_input($attributes);
                                                        ?>
                                                    </div>
                                                    <span class="input-group-addon bg-custom b-0 text-white">
                                                        <i class="icon-clock"></i>
                                                    </span>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Ruangan</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <select class="selectpicker" data-style="btn-white" name="ruangan">
                                                        <option value="Ruangan" selected="true" disabled="true">Ruangan</option>
                                                        <option value="Love">Love</option>
                                                        <option value="Peace">Peace</option>
                                                        <option value="Joy">Joy</option>
                                                        <option value="Aula">Aula</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-default waves-effect waves-light">Simpan</button>
                            </div>
                            <?php
                                echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
