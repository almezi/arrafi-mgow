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
					<h4 class="page-title">Edit Modul</h4>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('admin/kelola_modul');?>">Kelola Modul</a></li>
                        <li class="active">Edit Modul</li>
                    </ol>
                </div>
            </div>

			<div class="row">
				<div class="col-lg-6">
					<div class="card-box">
					<br>
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/update_modul">
						<?php
							foreach($list_modul->result()as $row) { ?>
							<div>
								<input type="hidden" name="kode" value="<?php echo $row->kode_modul;?>">
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Modul</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="modul" value="<?php echo $row->nama_modul;?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Link</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="link" value="<?php echo $row->link;?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Update
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_modul');?>">
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