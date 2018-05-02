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
					<h4 class="page-title">Otoritas</h4>
                </div>
            </div>
			<br>
			<div class="panel">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="m-b-30">
								<a href="<?php echo base_url('admin/grup_tambah');?>" class="btn btn-default waves-effect waves-light">
									<i class="fa fa-plus"></i> Tambah Group
								</a>
							</div>
							<div class="m-b-30">
								<a href="<?php echo base_url('admin/otoritas_tambah');?>" class="btn btn-default waves-effect waves-light">
									<i class="fa fa-plus"></i> Tambah Otoritas
								</a>
							</div>
						</div>
					</div>
                              
					<div class="">
						<table class="table table-striped" id="datatable">
							<thead>
								<tr>
									<th>Group</th>
									<th>Edit</th>
	                                <th>Jumlah Modul</th>
	                                <th>Lihat Modul</th>
	                            </tr>
	                        </thead>
							<tbody>
							<?php
								foreach($list_grup->result()as $row) { ?>
								<tr class="gradeX">
									<td><?php echo $row->nama_group;?></td>
									<td>
										<?php echo anchor('/admin/get_grup/'.$row->kode_group,
										'<div class="on-default edit-row"><i class="fa fa-pencil"></i></div>');
										?>
									</td>
									<td><?php echo $row->jumlah;?></td>
	                                <td>
										<?php echo anchor('/admin/get_otoritas_modul/'.$row->nama_group,
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