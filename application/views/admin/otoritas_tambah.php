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
					<h4 class="page-title">Tambah Otoritas</h4>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('/admin/kelola_otoritas');?>">Kelola Otoritas</a></li>
                        <li class="active">Tambah Otoritas</li>
                    </ol>
                </div>
            </div>
			
			<div class="row">
				<div class="col-lg-6">
					<div class="card-box">
					<br>
						<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('admin/simpan_otoritas')?>">
							<div class="form-group">
								<label class="col-sm-4 control-label">Group</label>
								<div class="col-sm-7">
									<select class="selectpicker show-tick" data-style="btn-white" name="group">
										<?php
											foreach($list_grup->result() as $rowgrup){?>
											<option value="<?php echo $rowgrup->kode_group;?>"><?php echo $rowgrup->nama_group;?></option>
										<?php	
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Modul</label>
								<div class="col-sm-7">
									<select class="selectpicker show-tick" data-style="btn-white" name="modul">
										<?php
											foreach($list_modul->result() as $rowmodul){?>
											<option value="<?php echo $rowmodul->kode_modul;?>"><?php echo $rowmodul->nama_modul;?></option>
										<?php	
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="simpan">
										Simpan
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('/admin/kelola_otoritas');?>">
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