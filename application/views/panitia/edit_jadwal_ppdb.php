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
                                <h4 class="page-title">Edit Jadwal PPDB</h4>
                            </div>
                        </div>
						<br>
						 <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
						<?php
                                $attributes = array(
                                    'method' => 'post',
                                    'role' => 'form',
                                    'data-toggle' => 'validator'
                                );

                                echo form_open('registrasi_c/ubah_jadwal_ppdb',$attributes);
                            ?>
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
															'value' => $id_jadwal,
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
                                                            'id' => 'nama_kegiatan',
															'value' => $nama_kegiatan
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
															'value' => $keterangan
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
                                                            'name' => 'tanggal_mulai',
															'value' => $tgl_mulai
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
                                            <label class="control-label col-sm-4">Tanggal Selesai</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'selesai',
                                                            'name' => 'tanggal_selesai',
															'value' => $tgl_selesai
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
                                            <label class="control-label col-sm-4">Tahun Ajaran</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'ta',
                                                            'id' => 'ta',
                                                            'parsley-trigger' => 'change',
                                                            'required' => true,
															'value' => $ta
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
                                            <label class="control-label col-sm-4">Status</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="bootstrap-timepicker">
                                                        <?php
                                                            $attributes = array(
                                                                'id' => 'status',
                                                                'name' => 'status',
                                                                'class' => 'form-control',
                                                                'readonly' => TRUE,
																'value' => $status
                                                            );

                                                            echo form_input($attributes);
                                                        ?>
                                                    </div>
                                                </div>         
                                            </div>
                                        </div>
                                    </div> 
                                </div>
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
							<button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-default waves-effect waves-light">Simpan</button>
                            <?php
                                echo form_close();
                            ?>
							</div>
                </div>
				</div>
                    </div>
                </div>

