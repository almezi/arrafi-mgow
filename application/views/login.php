	<div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
				<div class="panel-heading"> 
					<h3 class="text-center"> Login <strong class="text-custom">Arrafi</strong> </h3>
				</div>
				
				<p><?php echo $this->session->flashdata('user'); ?></p>
				<p><?php echo $this->session->flashdata('nonaktif'); ?></p>
				<p><?php echo $this->session->flashdata('gagal'); ?></p>
				
				<p><?php echo $this->session->flashdata('pesan'); ?></p>

				<div class="panel-body">
					<form class="form-horizontal m-t-20" method="POST" action="<?php echo base_url();?>login/cek_login">               
						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" required="" autofocus placeholder="Username" name="username">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" required="" placeholder="Password" name="password">
							</div>
						</div>

						<div class="form-group ">
							<div class="col-xs-12">
								<div class="checkbox checkbox-primary">
									<input id="checkbox-signup" type="checkbox">
									<label for="checkbox-signup">Ingat Saya</label>
								</div>    
							</div>
						</div>
                
						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
								<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Login</button>
							</div>
						</div>

						<div class="form-group m-t-30 m-b-0">
							<div class="col-sm-12">
								<a href="<?php echo base_url('c_home/reset'); ?>" class="text-dark"><i class="fa fa-lock m-r-5"></i> Lupa password?</a>
							</div>
						</div>
					</form> 
				</div>   
            </div>                              
            
			<div class="row">
            	<div class="col-sm-12 text-center">
            		<p><a href="<?php echo base_url('c_home/daftar'); ?>" class="text-primary m-l-5"><b>Daftar PPDB</b></a></p>   
				</div>
            </div>
        </div>