		<div class="container-alt">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="wrapper-page signup-signin-page">
						<div class="card-box">
					<div class="panel-heading">
					<h3 class="text-center"> Buku Tamu PPDB Online <br>
						<strong class="text-custom">Ar-Rafi'</strong>
					</h3>
					<?php echo $this->session->flashdata('pesan');?>
				</div>
				<div class="panel-body">
					<div class="row">
						<?php
							$attribut = array(
								'class' => 'form-horizontal m-t-20',
								'data-parsley-validate novalidate' => true
							);
							echo form_open('authentication_c/buku_tamu',$attribut);
						?>
						<div class="col-lg-6">
							<div class="p-20">
								<div class="form-group">
									<div class="col-xs-12">
										<?php 
											$attributes = array(
												'class' =>'form-control',
												'name'=> 'identitas',
												'id' => 'identitas',
												'placeholder'=>'No. Identitas (KTP/SIM)',
												'autofocus'=>true,
												'value' => set_value('identitas'),
												'required' => true,
												'data-parsley-type'=>"number"
											);
											echo form_input($attributes);
											echo form_error('identitas','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
										?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12">
										<?php 
											$attributes = array(
												'class' =>'form-control',
												'name'=> 'nama',
												'id' => 'nama',
												'placeholder'=>'Nama Orang Tua',
												'value' => set_value('nama'),
												'required' => true,
												'data-parsley-type'=>"alphanum"
											);
											echo form_input($attributes);
											echo form_error('nama','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
										?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12">
										<?php
											$attributes = array(
												'class' =>'form-control',
												'name'=> 'alamat',
												'placeholder'=>'Alamat',
												'id' => 'alamat',
												'rows' => 7,
												'value' => set_value('alamat'),
												'required' => true
											);
											echo form_textarea($attributes);
											echo form_error('alamat','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="p-20">
								<div class="form-group">
									<div class="col-xs-12">
										<?php 
											$attributes = array(
												'class' =>'form-control',
												'name'=> 'no_hp',
												'placeholder'=>'Nomor HP',
												'id' => 'no_hp',
												'value' => set_value('no_hp'),
												'required' => true,
												'maxlength' => 13
											);
											echo form_input($attributes);
											echo form_error('no_hp','<div class="alert alert-danger alert-dismissable">
		                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');

										?>
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-12">
										<?php 
											$attributes = array(
												'class' =>'form-control',
												'name'=> 'email',
												'placeholder'=>'Email',
												'id' => 'email',
												'value' => set_value('email'),
												'data-parsley-type'=>"email",
												'required' => true
											);
											echo form_input($attributes);
											echo form_error('email','<div class="alert alert-danger alert-dismissable">
		                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
										?>
									</div>
								</div>

								<div class="form-group ">
									<div class="col-xs-12">
										<?php
											$options = array(
												'Asal'=>'Asal',
												'Kab Bandung' => 'Kabupaten Bandung',
												'Kab Bandung Barat' => 'Kabupaten Bandung Barat',
												'Kab Bekasi' => 'Kabupaten Bekasi',
												'Kab Bogor' => 'Kabupaten Bogor',
												'Kab Ciamis' => 'Kabupaten Ciamis',
												'Kab Cianjur' => 'Kabupaten Cianjur',
												'Kab Cirebon' => 'Kabupaten Cirebon',
												'Kab Garut' => 'Kabupaten Garut',
												'Kab Indramayu' => 'Kabupaten Indramayu',
												'Kab Karawang' => 'Kabupaten Karawang',
												'Kab Kuningan' => 'Kabupaten Kuningan',
												'Kab Majalengka' => 'Kabupaten Majalengka',
												'Kab Pangandaran' => 'Kabupaten Pangandaran',
												'Kab Purwakarta' => 'Kabupaten Purwakarta',
												'Kab Subang' => 'Kabupaten Subang',
												'Kab Sukabumi' => 'Kabupaten Sukabumi',
												'Kab Sumedang' => 'Kabupaten Sumedang',
												'Kab Tasikmalaya' => 'Kabupaten Tasikmalaya',
												'Kota Bandung' => 'Kota Bandung',
												'Kota Banjar' => 'Kota Banjar',
												'Kota Bekasi' => 'Kota Bekasi',
												'Kota Bogor' => 'Kota Bogor',
												'Kota Cimahi' => 'Kota Cimahi',
												'Kota Cirebon' => 'Kota Cirebon',
												'Kota Depok' => 'Kota Depok',
												'Kota Sukabumi' => 'Kota Sukabumi',
												'Kota Tasikmalaya' => 'Kota Tasikmalaya'
											);

											$attributes = array(
												'class' =>'form-control',
												'required' => true
											);

											echo form_dropdown('asal',$options,'Asal',$attributes);
											echo form_error('asal','<div class="alert alert-danger alert-dismissable">
		                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
										?>
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-12">
										<div class="checkbox checkbox-primary">
											<input name="check" id="checkbox-signup" type="checkbox">
											<label for="checkbox-signup">Saya setuju dengan <a href="#">Syarat dan Ketentuan</a> yang berlaku.</label>
										</div>
									</div>
								</div>

								<div class="form-group text-center m-t-40">
									<div class="col-xs-12">
										<button class="btn btn-success btn-block text-uppercase waves-effect waves-light" type="submit">
											Daftar
										</button>


									</div>
								</div>
							</div>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						Sudah punya akun? <?php echo anchor('c_home/home', '<b>Login</b>');?>
					</p>
				</div>
			</div>

		</div>