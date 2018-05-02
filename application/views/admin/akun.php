<script type="text/javascript">
	function reset_confirm(){
		var konfirmasi=confirm("Anda yakin akan mereset password?");
		if (konfirmasi==true)
		{
			alert("Password berhasil direset sesuai username");
		}
		else
		{
			alert("Reset password dibatalkan");
			return false;
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
					<h4 class="page-title">User</h4>
                </div>
            </div>
			<br>
			<div class="panel">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="m-b-30">
								<a href="<?php echo base_url('admin/akun_tambah');?>" class="btn btn-default waves-effect waves-light">
									<i class="fa fa-plus"></i> Tambah User
								</a>
							</div>
							<div class="m-b-30">
								<a href="<?php echo base_url('admin/grup_user_tambah');?>" class="btn btn-default waves-effect waves-light">
									<i class="fa fa-plus"></i> Tambah User ke Group
								</a>
							</div>
						</div>
					</div>
                              
					<div class="">
						<table class="table table-striped" id="datatable">
							<thead>
								<tr>
									<th>Username</th>
									<th>Email</th>
	                                <th>Login Terakhir</th>
									<th>Status User</th>
	                                <th>Edit</th>
									<!--<th>Reset Password</th>-->
									<th>Jumlah Group</th>
									<th>Lihat Group</th>
	                            </tr>
	                        </thead>
							<tbody>
							<?php
								foreach($list_user->result()as $row) { ?>
								<tr class="gradeX">
									<td><?php echo $row->username;?></td>
									<td><?php echo $row->email;?></td>
									<td><?php echo $row->last_login;?></td>
									<td>
										<?php if ($row->status_user=='Aktif') { ?> 
											<span class="label label-success"><?php echo $row->status_user;?></span>
										<?php } else { ?>
											<span class="label label-danger"><?php echo $row->status_user;?></span>
										<?php } ?>
									</td>
									<td>
										<?php echo anchor('/admin/get_user/'.$row->username,
										'<div class="on-default edit-row"><i class="fa fa-pencil"></i></div>');
										?>
									</td>
									<!--<td>
										<?php echo anchor('/admin/get_reset/'.$row->username,
										'<div class="on-default edit-row" onclick="return reset_confirm()"><i class="fa fa-refresh"></i></div>');
										?>
									</td>-->
									<td><?php echo $row->jumlah;?></td>
									<td>
										<?php echo anchor('/admin/get_grup_user/'.$row->username,
										'<div class="on-default edit-row"><i class="fa fa-search-plus"></i></div>');
										?>
									</td>
	                            </tr>
							<?php
								}
							?>
	                        </tbody>
						</table>
					</div>
				</div><!-- end: page -->
			</div> <!-- end Panel -->
			
		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->