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
					<h4 class="page-title">User <?php echo $this->session->userdata('u.username');?></h4>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('admin/kelola_user');?>">Kelola User</a></li>
                        <li class="active">User <?php echo $this->session->userdata('u.username');?></li>
                    </ol>
                </div>
            </div>
			
			<div class="panel">
				<div class="panel-body">
                              
					<div class="">
						<table class="table table-striped" id="datatable">
							<thead>
								<tr>
									<th>Group</th>
									<th>Status Group</th>
									<th>Edit Status</th>
									<th>Hapus Group</th>
	                            </tr>
	                        </thead>
							<tbody>
							<?php
								foreach($list_grup->result()as $row) { ?>
								<tr class="gradeX">
									<td><?php echo $row->nama_group;?></td>
	                                <td>
										<?php if ($row->status_group=='Aktif') { ?> 
											<span class="label label-success"><?php echo $row->status_group;?></span>
										<?php } else { ?>
											<span class="label label-danger"><?php echo $row->status_group;?></span>
										<?php } ?>
									</td>
									<td>
										<?php echo anchor('/admin/get_grup_user_status/'.$row->id,
										'<div class="on-default edit-row"><i class="fa fa-pencil"></i></div>');
										?>
									</td>
									<td>
										<?php echo anchor('/admin/hps_grup_user/'.$row->kode_group.'/'.$row->username,
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

<script src="<?php echo base_url()?>assets/plugins/switchery/dist/switchery.min.js"></script><!-- Plugin Switchery -->