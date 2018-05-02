<script type="text/javascript">
	function show_confirm(){
		var konfirmasi=confirm("Anda yakin akan menghapus modul?");
		if (konfirmasi==true)
		{
			alert("Modul berhasil dihapus");
		}
		else
		{
			alert("Hapus modul dibatalkan");
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
					<h4 class="page-title">Modul</h4>
                </div>
            </div>
			<br>
			<div class="panel">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="m-b-30">
								<a href="<?php echo base_url('admin/modul_tambah');?>" class="btn btn-default waves-effect waves-light">
									<i class="fa fa-plus"></i> Tambah Modul
								</a>
							</div>
						</div>
					</div>
                              
					<div class="">
						<table class="table table-striped" id="datatable">
							<thead>
								<tr>
									<th>Modul</th>
	                                <th>Link</th>
	                                <th>Edit</th>
									<th>Hapus</th>
	                            </tr>
	                        </thead>
							<tbody>
							<?php
								foreach($list_modul->result()as $row) { ?>
								<tr class="gradeX">
									<td><?php echo $row->nama_modul;?></td>
									<td><?php echo $row->link;?></td>
	                                <td>
										<?php echo anchor('/admin/get_modul/'.$row->kode_modul,
										'<div class="on-default edit-row"><i class="fa fa-pencil"></i></div>');
										?>
									</td>
									<td>
										<?php echo anchor('/admin/hps_modul/'.$row->kode_modul,
										'<div class="on-default remove-row" onclick="return show_confirm()"><i class="fa fa-trash-o"></i></div>');
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