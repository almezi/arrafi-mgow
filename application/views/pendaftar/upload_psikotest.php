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
								<h4 class="page-title">Administrasi Psikotes</h4>
							</div>
						</div>
						<br>					
						<?php echo $this->session->flashdata('pesan');?>
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<p class="text-muted m-b-15 font-13">
										Pembayaran administrasi psikotes sebagai syarat untuk mengikuti seleksi.
									</p>
									<div class="row" data-parsley-validate novalidate>
                                        <?php
                                            $attributes = array(
                                                'method' => 'post',
                                                'role' => 'form',
                                                'data-togle'=>'validator'
                                            );

                                            echo form_open_multipart('pendaftar/unggah_bukti_bayar',$attributes);
                                        ?>
									
									
                                            	<div class="p-5">
                                            		<div class="form-group m-t-20">
	                                                    <h5><label>Tanggal Bayar</label></h5>
	                                                    <div class="col-sm-6">
                                                <div class="input-group">
                                                    <?php 
                                                        $attributes = array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'yyyy/mm/dd',
                                                            'id' => 'tanggal_mulai_buat_ppdb',
                                                            'name' => 'tanggal_bayar',
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
											<br></br>
												
                               
                                            <div class="col-md-6">
                                            	<div class="p-5">
                                            		<div class="form-group m-t-20">
	                                                    <h5><label>Jumlah Bayar</label></h5>
	                                                    <input type="text" name="jumlah_bayar" value="" class="form-control" maxlength="6" id="length" placeholder="Jumlah Bayar" required data-parsley-type="digits">
	                                                </div>
                                            	</div>

                                                <div class="p-5">
                                                    <div class="form-group m-t-0">
                                                        <?php
                                                            $attributes = array(
                                                                'class' => 'filestyle',
                                                                'data-buttonname' => 'btn-primary',
                                                                'name' => 'bukti_bayar',
                                                                'id' => 'bukti_bayar',
                                                                'type' => 'file',
                                                                'required' => true
                                                            );

                                                            echo form_input($attributes);
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="p-5">
                                                    <div class="form-group m-b-0">
                                                        <button class="btn btn-primary waves-effect waves-light">Upload</button>
                                                    </div>
                                                </div>
                                            </div>    
                                        <?php echo form_close();?>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>