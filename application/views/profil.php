<script type="text/javascript">
	function validasi(form){
		if(form.pass.value != md5(form.password.value)){
			alert("Password Lama Tidak Sama");
			form.password.focus();
			return false;
		}
		else if(form.password1.value != form.password2.value){
			alert("Password Baru Harus Sama");
			form.password2.focus();
			return false;
		}
		else{
			return true;
		}
	}
</script>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<?php
	if($this->session->userdata('username') == ''){
	redirect('c_home/home');

}else{
?>
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">

			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Ubah Password</h4>
                </div>
            </div>
			<br>
			<div class="row">
				<div class="col-lg-6">
					<div class="card-box">
					<br>
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>index.php/c_home/update_profil" onsubmit="return validasi(this);">
						<?php
							foreach($my_profil->result()as $row) { ?>
							<div class="form-group">
								<label class="col-sm-4 control-label">Username</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="username" value="<?php echo $row->username;?>" readonly>
								</div>
							</div>
							<input type="hidden" class="form-control" name="pass" value="<?php echo $row->password;?>">
							<div class="form-group">
								<label class="col-sm-4 control-label">Password Lama*</label>
								<div class="col-sm-7">
									<input type="password" placeholder="Password Lama" class="form-control" name="password" maxlength="20" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Password Baru*</label>
								<div class="col-sm-7">
									<input type="password" placeholder="Password Baru" class="form-control" name="password1" maxlength="20" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Ulangi Password*</label>
								<div class="col-sm-7">
									<input type="password" placeholder="Ulangi Password" class="form-control" name="password2" maxlength="20" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Update
									</button>
								</div>
							</div>
						<?php	
							}
						?>
						</form>
					</div>
				</div>
			</div>
	
		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->

<?php 
	}
?>