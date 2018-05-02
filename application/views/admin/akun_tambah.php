<script type="text/javascript">
	function validasi(form){
		var cekuser = /^[a-zA-Z0-9\_\-]{3,20}$/;
		var cekemail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		
		if(form.username.value.length > 1 && form.username.value.length < 6){
			alert("Panjang Username Minimal 6 Karakter");
			form.username.focus();
			return false;
		}
		else if(form.username.value.length > 1 && !cekuser.test(form.username.value)){
			alert("Username Hanya Memiliki Karakter Huruf Atau Angka");
			form.username.focus();
			return false;
		}
		else if(form.password1.value.length > 1 && form.password1.value.length < 6){
			alert("Panjang Password Minimal 6 Karakter");
			form.password1.focus();
			return false;
		}
		else if(form.password1.value != form.password2.value){
			alert("Password Harus Sama");
			form.password2.focus();
			return false;
		}
		else if(form.email.value.length > 1 && !cekemail.test(form.email.value)){
			alert("Alamat Email Tidak Valid");
			form.email.focus();
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
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">

			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Tambah User</h4>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('admin/kelola_user');?>">Kelola User</a></li>
                        <li class="active">Tambah User</li>
                    </ol>
                </div>
            </div>
			
			<div class="row">
				<div class="col-lg-6">
					<div class="card-box">
					<br>
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/simpan_user" onsubmit="return validasi(this);">
							<div class="form-group">
								<label class="col-sm-4 control-label">Username*</label>
								<div class="col-sm-7">
									<input type="text" placeholder="Username" class="form-control" name="username" maxlength="30" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Password*</label>
								<div class="col-sm-7">
									<input type="password" placeholder="Password" class="form-control" name="password1" maxlength="20" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Ulangi Password*</label>
								<div class="col-sm-7">
									<input type="password" placeholder="Ulangi Password" class="form-control" name="password2" maxlength="20" required>
									<p><?php echo $this->session->flashdata('salah'); ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Email*</label>
								<div class="col-sm-7">
									<input type="text" placeholder="Email" class="form-control" name="email" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="simpan">
										Simpan
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_user');?>">
										Kembali
									</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->