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
								<h4 class="page-title">Data Orang Tua</h4>
							</div>
						</div>
						<br>
						<?php echo $this->session->flashdata('pesan');?>
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<?php
                                        if (!empty($nama_ayah)) {
                                            ?>
                                    <h1><small>Data Orang Tua Telah Diinput</small></h1>
                                            <?php
                                        } else {
                                            ?>
                                    <div class="row">
                                        <?php
                                            $attributes = array(
                                                'method' => 'post',
                                                'role' => 'form'
                                            );
                                            echo form_open('Registrasi_C/input_ket_ortu',$attributes);
                                        ?>
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <div class="m-t-20">
                                                    <h5><label>Nama Ayah</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'nama_ayah',
                                                            'id' => 'length',
                                                            'value' => set_value('nama_ayah')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('nama_ayah','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Pendidikan Ayah</label></h5>
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

                                                        echo form_dropdown('pdd_ayah',$options,'Pendidikan',$attributes);

                                                         echo form_error('pdd_ayah','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Pekerjaan Ayah</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'pekerjaan_ayah',
                                                            'id' => 'length',
                                                            'value' => set_value('pekerjaan_ayah')
                                                        );
                                                        echo form_input($attributes);

                                                         echo form_error('pekerjaan_ayah','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Nama Perusahaan Ayah</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'nama_perusahaan_ayah',
                                                            'id' => 'length',
                                                            'value' => set_value('nama_perusahaan_ayah')
                                                        );
                                                        echo form_input($attributes);

                                                         echo form_error('nama_perusahaan_ayah','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><b>Alamat Perusahaan Ayah</b></h5>
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'alamat_perusahaan_ayah',
                                                            'id' => 'alamat',
                                                            'rows' => 2,
                                                            'value' => set_value('alamat_perusahaan_ayah')
                                                        ); 
                                                        echo form_textarea($attributes);

                                                         echo form_error('alamat_perusahaan_ayah','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Email Kantor Ayah</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 100,
                                                            'name' => 'email_kantor_ayah',
                                                            'id' => 'length',
                                                            'value' => set_value('email_kantor_ayah')
                                                        );
                                                        echo form_input($attributes);

                                                         echo form_error('email_kantor_ayah','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <div class="m-t-20">
                                                    <h5><label>Nama Ibu</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'nama_ibu',
                                                            'id' => 'length',
                                                            'value' => set_value('nama_ibu')
                                                        );
                                                        echo form_input($attributes);

                                                         echo form_error('nama_ibu','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Pendidikan Ibu</label></h5>
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

                                                        echo form_dropdown('pdd_ibu',$options,'Pendidikan',$attributes);

                                                         echo form_error('pdd_ibu','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Pekerjaan Ibu</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'pekerjaan_ibu',
                                                            'id' => 'length',
                                                            'value' => set_value('pekerjaan_ibu')
                                                        );
                                                        echo form_input($attributes);

                                                         echo form_error('pekerjaan_ibu','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Nama Perusahaan Ibu</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'nama_perusahaan_ibu',
                                                            'id' => 'length'
                                                        );
                                                        echo form_input($attributes);

                                                         echo form_error('nama_perusahaan_ibu','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><b>Alamat Perusahaan Ibu</b></h5>
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 225,
                                                            'name' => 'alamat_perusahaan_ibu',
                                                            'id' => 'alamat',
                                                            'rows' => 2
                                                        ); 
                                                        echo form_textarea($attributes);

                                                         echo form_error('alamat_perusahaan_ibu','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Email Kantor Ibu</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 100,
                                                            'name' => 'email_kantor_ibu',
                                                            'id' => 'length'
                                                        );
                                                        echo form_input($attributes);

                                                         echo form_error('email_kantor_ibu','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20" style="float: right;">
                                                    <?php echo anchor('registrasi_c/form_ket_siswa','<span class="btn-label"><i class="fa fa-arrow-left"></i></span>Sebelumnya',array('class'=>'btn btn-default waves-effect waves-light'));?>

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