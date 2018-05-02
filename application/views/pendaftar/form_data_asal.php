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
										Data Asal Mula
									</li>
								</ol>
							</div>
						</div>

						<?php
                            echo $this->session->flashdata('pesan');
                        ?>
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b><?php echo $toolbar?></b></h4>
									<div class="row">
                                        <?php
                                            if (!empty($data_asal)) {
                                                ?>
                                                <h1><small>Data Asal Telah Diinput</small></h1>
                                                
                                                <?php
                                            } else {
                                                ?>
                                        <?php
                                            $attributes = array(
                                                'method' => 'post',
                                                'role' => 'form'
                                            );
                                            echo form_open('Registrasi_C/input_ket_asal',$attributes);
                                        ?>
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <div class="m-t-20">
                                                    <h5><label>Asal Anak</label></h5>
                                                    <?php
                                                        $options = array(
                                                            'Asal' => 'Asal Anak',
                                                            'PG' => 'Play Group',
                                                            'TK' => 'Taman Kanak - Kanak',
                                                            'RA' => 'Raudhatul Athfal',
                                                            'PAUD' => 'Pendidikan Anak Usia Dini',
                                                            'Lainnya' => 'Lainnya'
                                                        );

                                                        $attributes = array(
                                                            'class' => 'selectpicker',
                                                            'data-style' => 'btn-white'
                                                        );
                                                        echo form_dropdown('asal_anak',$options,'Asal',$attributes);

                                                        echo form_error('asal_anak','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>

                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Nama Asal</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'nama_asal',
                                                            'id' => 'length',
                                                            'value' => set_value('nama_asal')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('nama_asal','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>No/Tahun SK</label></h5>
                                                    <?php
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 50,
                                                            'name' => 'no_tahun_sk',
                                                            'id' => 'length',
                                                            'value' => set_value('no_tahun_sk')
                                                        );
                                                        echo form_input($attributes);

                                                        echo form_error('no_tahun_sk','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <div class="m-t-20">
                                                    <h5><b>Lama Belajar</b></h5>
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'maxlength' => 2,
                                                            'name' => 'lama_belajar',
                                                            'id' => 'length',
                                                            'value' => set_value('lama_belajar')
                                                        ); 
                                                        echo form_input($attributes);

                                                        echo form_error('lama_belajar','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                    ?>
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><label>Tanggal Terima SD</label></h5>
                                                    <div class="form-group">
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <?php
                                                                    $attributes = array(
                                                                        'type' => 'text',
                                                                        'class' => 'form-control',
                                                                        'placeholder' => 'mm/dd/yyyy',
                                                                        'id' => 'tanggal_terima',
                                                                        'name' => 'tanggal_terima',
                                                                        'value' => set_value('tanggal_terima')
                                                                    );

                                                                    echo form_input($attributes);
                                                                ?>
                                                                <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                                            </div><!-- input-group -->
                                                            <?php
                                                                echo form_error('tanggal_terima','<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>                          

                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                

                                                <div class="m-t-20" style="float: right;">
                                                    <?php echo anchor('Pendaftar_C/form_ket_wali','<span class="btn-label"><i class="fa fa-arrow-left"></i></span>Sebelumnya',array('class'=>'btn btn-default waves-effect waves-light'));?>

                                                    <button type="submit" class="btn btn-default waves-effect waves-light">Selesai
                                                        
                                                    </button>
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
						</div>
            		</div> <!-- container -->
                </div> <!-- content -->