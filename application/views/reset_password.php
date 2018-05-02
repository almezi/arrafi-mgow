<script type="text/javascript">
	function validasi(form){
		var cekemail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		
		if(form.password1.value.length >= 1 && form.password1.value.length < 6){
			alert("Panjang Password Minimal 6 Karakter");
			form.password1.focus();
			return false;
		}
		else if(form.password1.value != form.password2.value){
			alert("Password Harus Sama");
			form.password2.focus();
			return false;
		}
		else if(form.email.value.length >= 1 && !cekemail.test(form.email.value)){
			alert("Alamat Email Tidak Valid");
			form.email.focus();
			return false;
		}
		else{
			return true;
		}
	}
</script>

		<div class="animationload">
            <div class="loader"></div>
        </div>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Reset Password </h3>
				</div>
				
				<p><?php echo $this->session->flashdata('user1'); ?></p>
				<p><?php echo $this->session->flashdata('user2'); ?></p>
				<p><?php echo $this->session->flashdata('aktif'); ?></p>
				<p><?php echo $this->session->flashdata('email1'); ?></p>
				<p><?php echo $this->session->flashdata('email2'); ?></p>
				
				<p><?php echo $this->session->flashdata('pesan'); ?></p>
				
				<div class="panel-body">
					<form class="form-horizontal m-t-20" role="form" method="post" action="<?php echo base_url();?>login/ubah_user" onsubmit="return validasi(this);">               
						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" required="" autofocus placeholder="Username" name="username">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="text" required="" placeholder="Email" name="email">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" required="" placeholder="Password Baru" name="password1" maxlength="20">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" required="" placeholder="Ulangi Password" name="password2" maxlength="20">
							</div>
						</div>
                
						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
								<button class="btn btn-default btn-block text-uppercase waves-effect waves-light" type="submit">Ubah</button>
							</div>
						</div>
					</form> 
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 text-center">
					<p><a href="<?php echo base_url('c_home/home'); ?>" class="text-primary m-l-5"><b>Kembali</b></a></p>   
				</div>
			</div>
		</div>