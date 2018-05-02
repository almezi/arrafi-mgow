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
                                        OPS
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
                                                <th>Self Identity</th>
                                                <th>Part of Body</th>
                                                <th>Observation</th>
                                                <th>Math/Counting</th>
                                                <th>Writing & Reading</th>
                                                <th>Pengetahuan Agama</th>
                                                <th>Sikap</th>
                                                <th>Keterangan</th>
                                                <th>Total</th>
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
                                                    <td><?php echo $value->self_identity;?></td>
                                                    <td><?php echo $value->part_of_body;?></td>
                                                    <td><?php echo $value->observation;?></td>
                                                    <td><?php echo $value->math_counting;?></td>
                                                    <td><?php echo $value->writing_reading;?></td>
                                                    <td><?php echo $value->pengetahuan_agama;?></td>
                                                    <td><?php echo $value->sikap;?></td>
                                                    <td><?php echo $value->keterangan;?></td>
                                                    <td><?php echo $value->total;?></td>
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
                                                        <?php
                                                            if (empty($value->self_identity)||$value->self_identity<=0||empty($value->part_of_body)||$value->part_of_body<=0||empty($value->observation)||$value->observation<=0||empty($value->math_counting)||$value->math_counting<=0||empty($value->writing_reading)||$value->writing_reading<=0||empty($value->pengetahuan_agama)||$value->pengetahuan_agama<=0||empty($value->sikap)||$value->sikap<=0||empty($value->keterangan)||$value->keterangan=="") {
                                                                ?>
                                                                <a href="#"
                                                                    title="Input Nilai"
                                                                    data-no="<?php echo $value->no_pendaftaran;?>" data-toggle="modal" data-target="#input_nilai_ops"
                                                                <i style="color:#34d3eb;" class="fa fa-pencil m-r-5 fa-2x"></i><span></span></a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="#"
                                                                    class="on-default edit-row"
                                                                    title="Edit"
                                                                    Style="color: #29b6f6;"
                                                                    data-no="<?php echo $value->no_pendaftaran;?>"
                                                                    data-self="<?php echo $value->self_identity;?>"
                                                                    data-part="<?php echo $value->part_of_body;?>"
                                                                    data-observation="<?php echo $value->observation;?>"
                                                                    data-math="<?php echo $value->math_counting;?>"
                                                                    data-writing="<?php echo $value->writing_reading;?>"
                                                                    data-pengetahuan="<?php echo $value->pengetahuan_agama;?>"
                                                                    data-sikap="<?php echo $value->sikap;?>"
                                                                    data-keterangan="<?php echo $value->keterangan;?>"
                                                                    data-toggle="modal"
                                                                    data-target="#edit_nilai_ops"
                                                                    class="btn btn-default waves-effect waves-light"
                                                                >
                                                                    <i class="fa fa-pencil fa-2x"></i>
                                                                    <span></span>
                                                                </a>
                                                                <?php
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

<!-- ============================================================== -->
<!-- Buat Nilai OPS -->
<!-- ============================================================== -->

                <div id="input_nilai_ops" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <?php
                                $attributes = array(
                                    'method' => 'post',
                                    'role' => 'form',
                                    'data-parsley-validate novalidate' => true
                                );

                                echo form_open('Seleksi_C/input_nilai_ops',$attributes);
                            ?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Input Data</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">No Pendaftaran</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'no_pendaftaran',
                                                            'id' => 'no_pendaftaran',
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
                                            <label class="control-label col-sm-4">Self Identity</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'self_identity',
                                                            'id' => 'self_identity',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer',
                                                            'type'=>'text range',
                                                            'min'=>0,
                                                            'max'=>40
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
                                            <label class="control-label col-sm-4">Part of Body</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'part_of_body',
                                                            'id' => 'part_of_body',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer',
                                                            'type'=>'text range','min'=>0,
                                                            'max'=>24
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
                                            <label class="control-label col-sm-4">Observation</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'observation',
                                                            'id' => 'observation',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer',
                                                            'type'=>'text range','min'=>0,
                                                            'max'=>20
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
                                            <label class="control-label col-sm-4">Math/Counting</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'math_counting',
                                                            'id' => 'math_counting',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer',
                                                            'type'=>'text range','min'=>0,
                                                            'max'=>60
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
                                            <label class="control-label col-sm-4">Writing & Reading</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'writing_reading',
                                                            'id' => 'writing_reading',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer',
                                                            'type'=>'text range','min'=>0,
                                                            'max'=>40
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
                                            <label class="control-label col-sm-4">Pengetahuan Agama</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'pengetahuan_agama',
                                                            'id' => 'pengetahuan_agama',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer',
                                                            'type'=>'text range','min'=>0,
                                                            'max'=>80
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
                                            <label class="control-label col-sm-4">Sikap</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'sikap',
                                                            'id' => 'sikap',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer',
                                                            'type'=>'text range','min'=>0,
                                                            'max'=>36
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
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <div class="bootstrap-timepicker">
                                                                <select name="keterangan" class="selectpicker" data-style="btn-white">
                                                                    <option disabled="true" selected="true">Keterangan</option>
                                                                    <option value="15 Menit">15 Menit</option>
                                                                    <option value="Lebih 15 Menit">Lebih 15 Menit</option>
                                                                </select>
                                                            </div>
                                                        </div>         
                                                    </div>
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
<!-- Ubah Nilai OPS -->
<!-- ============================================================== -->
                <div id="edit_nilai_ops" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <?php
                                $attributes = array(
                                    'method' => 'post',
                                    'role' => 'form'
                                );

                                echo form_open('Seleksi_C/ubah_nilai_ops',$attributes);
                            ?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Edit Jadwal</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">No Pendaftaran</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'no_pendaftaran',
                                                            'id' => 'no_pendaftaran',
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
                                            <label class="control-label col-sm-4">Self Identity</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'self_identity',
                                                            'id' => 'self_identity',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer'
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
                                            <label class="control-label col-sm-4">Part of Body</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'part_of_body',
                                                            'id' => 'part_of_body',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer'
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
                                            <label class="control-label col-sm-4">Observation</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'observation',
                                                            'id' => 'observation',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer'
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
                                            <label class="control-label col-sm-4">Math/Counting</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'math_counting',
                                                            'id' => 'math_counting',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer'
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
                                            <label class="control-label col-sm-4">Writing & Reading</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'writing_reading',
                                                            'id' => 'writing_reading',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer'
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
                                            <label class="control-label col-sm-4">Pengetahuan Agama</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php

                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'pengetahuan_agama',
                                                            'id' => 'pengetahuan_agama',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer'
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
                                            <label class="control-label col-sm-4">Sikap</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'name' => 'sikap',
                                                            'id' => 'sikap',
                                                            'parsley-trigger' => 'change',
                                                            'data-parsley-type' => 'integer'
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
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <div class="bootstrap-timepicker">
                                                                <select name="keterangan" class="selectpicker" data-style="btn-white">
                                                                    <option disabled="true" selected="true">Keterangan</option>
                                                                    <option value="15 Menit">15 Menit</option>
                                                                    <option value="Lebih 15 Menit">Lebih 15 Menit</option>
                                                                </select>
                                                            </div>
                                                        </div>         
                                                    </div>
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

			<?php
		} else {
			echo "Maaf. Anda Tidak Dapat Mengakses Halaman Ini";
		}
	}
?>