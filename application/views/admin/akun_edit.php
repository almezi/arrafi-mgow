<script type="text/javascript">
	function validasi(form){
		var cekemail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		
		if(form.email.value.length > 1 && !cekemail.test(form.email.value)){
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
					<h4 class="page-title">Edit User</h4>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('admin/kelola_user');?>">Kelola User</a></li>
                        <li class="active">Edit User</li>
                    </ol>
                </div>
            </div>
			
			<div class="row">
				<div class="col-lg-6">
					<div class="card-box">
					<br>
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/update_user" onsubmit="return validasi(this);">
						<?php
							foreach($list_user->result()as $row) { ?>
							<div class="form-group">
								<label class="col-sm-4 control-label">Username</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="username" value="<?php echo $row->username;?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Password</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="password" value="<?php echo $row->password;?>" disabled>
								</div>
								<?php echo anchor('/admin/ubah_password/'.$row->username,
									'<div class="on-default edit-row"><i class="fa fa-pencil"></i></div>');
								?>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Email</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="email" value="<?php echo $row->email;?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Status User</label>
								<div class="col-sm-7">
									<select class="selectpicker show-tick" data-style="btn-white" name="status_user">
										<option value="Aktif" <?php echo ($row->status_user=='Aktif'?'selected="selected"':'');?>>Aktif</option>
										<option value="Non-Aktif" <?php echo ($row->status_user=='Non-Aktif'?'selected="selected"':'');?>>Non-Aktif</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Update
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_user');?>">
										Kembali
									</a>
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