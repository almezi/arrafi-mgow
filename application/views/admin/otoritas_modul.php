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
					<h4 class="page-title">Group <?php echo $this->session->userdata('nama_group');?></h4>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('admin/kelola_otoritas');?>">Kelola Otoritas</a></li>
                        <li class="active">Group <?php echo $this->session->userdata('nama_group');?></li>
                    </ol>
                </div>
            </div>
			
			<div class="panel">
				<div class="panel-body">
                              
					<div class="">
						<table class="table table-striped" id="datatable">
							<thead>
								<tr>
									<th>Modul</th>
									<th>Link</th>
									<th>Status Modul</th>
									<th>Edit Status</th>
	                            </tr>
	                        </thead>
							<tbody>
							<?php
								foreach($list_modul->result()as $row) { ?>
								<tr class="gradeX">
									<td><?php echo $row->nama_modul;?></td>
									<td><?php echo $row->link;?></td>
	                                <td>
										<?php if ($row->status=='Aktif') { ?> 
											<span class="label label-success"><?php echo $row->status;?></span>
										<?php } else { ?>
											<span class="label label-danger"><?php echo $row->status;?></span>
										<?php } ?>
									</td>
									<td>
										<?php echo anchor('/admin/get_otoritas_status/'.$row->kode,
										'<div class="on-default edit-row"><i class="fa fa-pencil"></i></div>');
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

<script src="<?php echo base_url()?>assets/plugins/switchery/dist/switchery.min.js"></script><!-- Plugin Switchery -->