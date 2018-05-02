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
                                <h4 class="page-title">Edit Jadwal Seleksi</h4>
                            </div>
                        </div>
						<br>
                       <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">

                            <?php
                                $attributes = array(
                                    'method' => 'post',
                                    'role' => 'form'
                                );

                                echo form_open('Registrasi_C/ubah_jadwal_seleksi',$attributes);
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
                                                            'readonly' => true
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
                                            <label class="control-label col-sm-4">Tanggal</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'id' => 'tanggal',
                                                            'name' => 'tanggal',
															'value' => $tanggal
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
                                            <label class="col-sm-4 control-label">Waktu Mulai</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="bootstrap-timepicker">
                                                        <?php
                                                            $attributes = array(
                                                                'id' => 'timepicker1',
                                                                'name' => 'waktu_mulai',
                                                                'class' => 'form-control',
																'value' => $waktu_mulai
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
                                                                'id' => 'timepicker3',
                                                                'name' => 'waktu_selesai',
                                                                'class' => 'form-control',
																'value' => $waktu_selesai
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
                                                    <select  class="selectpicker" data-style="btn-white" name="ruangan">
                                                        <option value="<?php echo $nama_ruangan?>" selected="true" disabled="true"><?php echo $nama_ruangan?></option>
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
								<?php
									echo form_hidden('ruangan_tamp', $nama_ruangan);
									echo form_hidden('status_tamp', $status);
								?>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Status</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <select class="selectpicker" data-style="btn-white" name="status">
                                                        <option value="<?php echo $status?>" selected="true" disabled="true"><?php echo $status?></option>
                                                        <option value="Terlaksana">Terlaksana</option>
                                                        <option value="Berlangsung">Berlangsung</option>
                                                        <option value="Belum">Belum</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <br>
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