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
								<h4 class="page-title">{page}</h4>
								<ol class="breadcrumb">
									<li>
										<a href="#">Formulir</a>
									</li>
									<li>
										<a href="#">Pembayaran</a>
									</li>
									<li class="active">
									</li>
								</ol>
							</div>
						</div>
						
						
						
						
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>{toolbar}</b></h4>
									<p class="text-muted m-b-15 font-13">
										Pembayaran administrasi psikotest sebagai syarat untuk mengikuti seleksi.
									</p>
									<div class="row">
                                        <?php
                                            $attributes = array(
                                                'method' => 'post',
                                                'role' => 'form'
                                            );

                                            echo form_open_multipart('welcome/update_profile_picture',$attributes);
                                        ?>
                                            <div class="col-md-6">
                                                <div class="p-20">
                                                    <div class="form-group m-b-0">
                                                        <?php
                                                            $attributes = array(
                                                                'class' => 'filestyle',
                                                                'data-buttonname' => 'btn-primary',
                                                                'name' => 'avatar',
                                                                'id' => 'avatar',
                                                                'type' => 'file'
                                                            );

                                                            echo form_input($attributes);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6" style="float: right;">
                                                <div class="p-20">
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