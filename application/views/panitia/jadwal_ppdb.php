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
                                <h4 class="page-title">Jadwal PPDB</h4>
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
                                            'id' => 'buat_jadwal_ppdb',
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
                                    data-toolbar="#buat_jadwal_ppdb" class="table table-striped toggle-circle m-b-0" data-page-size="9">
                                        <thead>
                                            <tr>
                                                <th data-toggle="id">No</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
												<th>Tahun Ajaran</th>
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
                                                    <td><?php echo date('d-m-Y',strtotime($value->tgl_mulai));?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($value->tgl_selesai));?></td>
													<td><?php echo $value->ta;?></td>
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
													 echo anchor('registrasi_c/edit_jadwal_ppdb/'.$value->id_jadwal,' <i style="color: #29b6f6;" class="fa fa-pencil fa-2x fa-fw"></i> <span></span> ', $attributes);
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

                                                            echo anchor('Registrasi_C/hapus_jadwal_ppdb/'.$value->id_jadwal,' <i style="color:#f05050" class="fa fa-trash-o fa-2x fa-fw"></i> <span></span> ', $attributes);
                                                        ?>
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



                <!-- ============================================================== -->
                <!-- Buat Jadwal PPDB -->
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

                                echo form_open('Registrasi_C/buat_jadwal_ppdb',$attributes);
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
                                            <label class="control-label col-sm-4">Tanggal Mulai</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'tanggal_mulai_buat_ppdb',
                                                            'name' => 'tgl_mulai',
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
                                            <label class="control-label col-sm-4">Tanggal Selesai</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'tanggal_selesai_buat_ppdb',
                                                            'name' => 'tgl_selesai',
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
                                            <label class="control-label col-sm-4">Tahun Ajaran</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'ta',
                                                            'id' => 'ta',
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



                <!-- ============================================================== -->
                <!-- Ubah Jadwal PPDB -->
                <!-- ============================================================== -->

                <div id="edit_jadwal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" data-parsley-validate novalidate>
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <?php
                                $attributes = array(
                                    'method' => 'post',
                                    'role' => 'form',
                                    'data-toggle' => 'validator'
                                );

                                echo form_open('Registrasi_C/ubah_jadwal_ppdb',$attributes);
                            ?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Edit Jadwal</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">ID Jadwal</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'id_jadwal',
                                                            'id' => 'id_jadwal',
                                                            'readonly' => TRUE
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
                                            <label class="control-label col-sm-4">Nama Kegiatan</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'nama_kegiatan',
                                                            'id' => 'nama_kegiatan'
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
                                                            'id' => 'keterangan'
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
                                            <label class="control-label col-sm-4">Tanggal Mulai</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'mulai',
                                                            'name' => 'mulai',
                                                            'readonly' => TRUE
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
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'tanggal_mulai_edit_ppdb',
                                                            'name' => 'tanggal_mulai'
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
                                            <label class="control-label col-sm-4">Tanggal Selesai</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'selesai',
                                                            'name' => 'selesai',
                                                            'readonly' =>TRUE
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
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'tanggal_selesai_edit_ppdb',
                                                            'name' => 'tanggal_selesai'
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
                                            <label class="control-label col-sm-4">Status</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="bootstrap-timepicker">
                                                        <?php
                                                            $attributes = array(
                                                                'id' => 'status',
                                                                'name' => 'status',
                                                                'class' => 'form-control',
                                                                'readonly' => TRUE
                                                            );

                                                            echo form_input($attributes);
                                                        ?>
                                                    </div>
                                                </div>         
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4"></label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="bootstrap-timepicker">
                                                    <select name="status" class="selectpicker" data-style="btn-white">
                                                        <option disabled="true" selected="true">Status</option>
                                                        <option value="Belum">Belum</option>
                                                        <option value="Berlangsung">Berlangsung</option>
                                                        <option value="Terlaksana">Terlaksana</option>
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