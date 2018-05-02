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
					<h4 class="page-title">Kustomisasi Modul</h4>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('admin/kelola_otoritas');?>">Kelola Otoritas</a></li>
                        <li class="active">Edit Status</li>
                    </ol>
                </div>
            </div>
			
			<div class="row">
				<div class="col-lg-6">
					<div class="card-box">
					<br>
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/update_otoritas">
						<?php
							foreach($list_modul->result()as $row) { ?>
							<input type="hidden" class="form-control" name="kode" value="<?php echo $row->kode;?>">
							<input type="hidden" class="form-control" name="grup" value="<?php echo $row->nama_group;?>">
							<div class="form-group">
								<label class="col-sm-4 control-label">Modul</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="modul" value="<?php echo $row->nama_modul;?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Link</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="link" value="<?php echo $row->link;?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Status</label>
								<div class="col-sm-7">
									<select class="selectpicker show-tick" data-style="btn-white" name="status">
										<option value="Aktif" <?php echo ($row->status=='Aktif'?'selected="selected"':'');?>>Aktif</option>
										<option value="Non-Aktif" <?php echo ($row->status=='Non-Aktif'?'selected="selected"':'');?>>Non-Aktif</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Update
									</button>
									<?php echo anchor('/admin/get_otoritas_modul/'.$row->nama_group,
										'<div class="btn btn-default waves-effect waves-light m-l-5">Kembali</div>');
									?>
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