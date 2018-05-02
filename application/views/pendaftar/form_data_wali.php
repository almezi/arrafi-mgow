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
								<h4 class="page-title"><?php echo $page?></h4>
								<ol class="breadcrumb">
									<li>
										<a href="#">Registrasi</a>
									</li>
									<li>
										<a href="#">Formulir</a>
									</li>
									<li class="active">
										Data Wali
									</li>
								</ol>
							</div>
						</div>

						<?php echo $this->session->flashdata('pesan');?>
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b><?php echo $toolbar?></b></h4>
									<p class="text-muted m-b-30 font-13">Diisi jika tinggal bersama wali</p>
									<?php
                                        if (!empty($data_wali)) {
                                            ?>
                                    <h1><small>Data Wali telah diinput</small></h1>
                                            <?php
                                        } else {
                                            ?>
                                    <div class="row">
                                        <?php
                                            $attributes = array(
                                                'method' => 'post',
                                                'role' => 'form'
                                            );
                                            echo form_open('Registrasi_C/input_ket_wali',$attributes);
                                        ?>
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <div class="m-t-20">
                                                    <h5><label>ID Wali</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 16,
                                                            'name' => 'id_wali',
                                                            'id' => 'length',
                                                            'value' => set_value('id_wali'),
                                                            'placeholder' => 'No. Identitas (KTP/SIM/Passpor)'
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('id_wali','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>
                                                <div class="m-t-20">
                                                    <h5><label>Nama Wali</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'nama_wali',
                                                            'id' => 'length',
                                                            'value' => set_value('nama_wali')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('nama_wali','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Hubungan Keluarga</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 25,
                                                            'name' => 'hubungan_keluarga',
                                                            'id' => 'length',
                                                            'value' => set_value('hubungan_keluarga')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('hubungan_keluarga','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Pekerjaan wali</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'pekerjaan_wali',
                                                            'id' => 'length',
                                                            'value' => set_value('pekerjaan_wali')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('pekerjaan_wali','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Nama Perusahaan Wali</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'nama_perusahaan_wali',
                                                            'id' => 'length',
                                                            'value' => set_value('nama_perusahaan_wali')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('nama_perusahaan_wali','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><b>Alamat Perusahaan Wali</b></h5>
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'alamat_perusahaan_wali',
                                                            'id' => 'alamat',
                                                            'rows' => 2,
                                                            'value' => set_value('alamat_perusahaan_wali')
                                                        ); 
                                                        echo form_textarea($attributes);

                                                        echo form_error('alamat_perusahaan_wali','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Email Kantor Wali</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 100,
                                                            'name' => 'email_kantor_wali',
                                                            'id' => 'length',
                                                            'value' => set_value('email_kantor_wali')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('email_kantor_wali','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Pendidikan Wali</label></h5>
                                                    <?php
                                                        $options = array(
                                                            'Pendidikan' => 'Pendidikan',
                                                            'SD' => 'SD',
                                                            'SMP' => 'SMP',
                                                            'SMA' => 'SMA',
                                                            'D1' => 'D1',
                                                            'D2' => 'D2',
                                                            'D3' => 'D3',
                                                            'S1' => 'S1',
                                                            'S2' => 'S2',
                                                            'S3' => 'S3'
                                                        );

                                                        $attributes = array(
                                                            'class' => 'selectpicker',
                                                            'data-style' => 'btn-white'
                                                        );

                                                        echo form_dropdown('pdd_wali',$options,'Pendidikan',$attributes);

                                                        echo form_error('pdd_wali','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>No HP</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 13,
                                                            'name' => 'no_hp',
                                                            'id' => 'length',
                                                            'value' => set_value('no_hp')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('no_hp','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <div class="m-t-10" style="display: inline-block;">
                                                    <h5><label>Kode Area</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 5,
                                                            'name' => 'kode_area',
                                                            'id' => 'length',
                                                            'value' => set_value('kode_area')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('kode_area','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-10" style="display: inline-block;">
                                                    <h5><label>Telepon Rumah</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 10,
                                                            'name' => 'telp_rumah',
                                                            'id' => 'length',
                                                            'value' => set_value('telp_rumah')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('telp_rumah','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><b>Alamat Rumah</b></h5>
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'alamat',
                                                            'id' => 'alamat',
                                                            'rows' => 6,
                                                            'value' => set_value('alamat_rumah')
                                                        ); 
                                                        echo form_textarea($attributes);

                                                        echo form_error('alamat','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <div class="m-t-10" style="display: inline-block;">
                                                        <h5><label>RT</label></h5>
                                                        <?php
                                                            $attributes = array(
                                                                'class' => 'form-control',
                                                                'maxlength' => 3,
                                                                'name' => 'rt',
                                                                'id' => 'length',
                                                                'value' => set_value('rt')
                                                            );
                                                            echo form_input($attributes);

                                                            echo form_error('rt','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                        ?>
                                                    </div>

                                                    <div class="m-t-10" style="display: inline-block;">
                                                        <h5><label>RW</label></h5>
                                                        <?php
                                                            $attributes = array(
                                                                'class' => 'form-control',
                                                                'maxlength' => 3,
                                                                'name' => 'rw',
                                                                'id' => 'length',
                                                                'value' => set_value('rw')
                                                            );
                                                            echo form_input($attributes);

                                                            echo form_error('rw','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                        ?>
                                                    </div>
                                                </div>

                                                 <div class="m-t-20">
                                                    <h5><label>Kelurahan</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 20,
                                                            'name' => 'kelurahan',
                                                            'id' => 'length',
                                                            'value' => set_value('kelurahan')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('kelurahan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Kecamatan</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 20,
                                                            'name' => 'kecamatan',
                                                            'id' => 'length',
                                                            'value' => set_value('kecamatan')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('kecamatan','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Kabupaten/Kota</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 20,
                                                            'name' => 'kota',
                                                            'id' => 'length',
                                                            'value' => set_value('kota')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('kota','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Provinsi</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 30,
                                                            'name' => 'provinsi',
                                                            'id' => 'length',
                                                            'value' => set_value('provinsi')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('provinsi','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div> 

                                                <div class="m-t-30">
                                                    <div class="m-t-10">
                                                        <h5><label>Kode Pos</label></h5>
                                                        <?php
                                                            $attributes = array(
                                                                'class' => 'form-control',
                                                                'maxlength' => 5,
                                                                'name' => 'kode_pos',
                                                                'id' => 'length',
                                                                'value' => set_value('kode_pos')
                                                            );
                                                            echo form_input($attributes);

                                                            echo form_error('kode_pos','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                        ?>
                                                    </div>
                                                </div>                                                

                                                <div class="m-t-20" style="float: right;">
                                                    <?php echo anchor('registrasi_c/form_ket_ortu','<span class="btn-label"><i class="fa fa-arrow-left"></i></span>Sebelumnya',array('class'=>'btn btn-default waves-effect waves-light'));?>

                                                    <?php echo anchor('Registrasi_C/form_ket_asal','Lewati<span class="btn-label btn-label-right"><i class="fa fa-arrow-right"></i></span>',array('class'=>'btn btn-success waves-effect waves-light'));?>

                                                    <button type="submit" class="btn btn-default waves-effect waves-light">Selanjutnya
                                                        <span class="btn-label btn-label-right">
                                                            <i class="fa fa-arrow-right"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close();?>
                                            <?php
                                        }
                                    ?>
								</div>
							</div>
						</div>
            		</div> <!-- container -->
                </div> <!-- content -->