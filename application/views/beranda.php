<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<?php
if($this->session->userdata('username') == ''){
	redirect('c_home/home');
}else{

?>
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">

			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Beranda</h4>
                    <p class="text-muted page-title-alt">
						Selamat Datang <strong><?php echo $this->session->userdata['username']; ?></strong>! 
					</p>
				</div>
            </div>

			<div class="row">
				<div class="col-lg-6">
					<div class="card-box">
						<h4 class="m-t-0 m-b-20 header-title"><b>Riwayat User</b></h4>
						<div class="nicescroll mx-box">
							<div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
										<?php
											foreach($list_history_user->result()as $row) { ?>
											<tr>
												<td>
													<?php if ($row->jenis=='Update') { ?> 
														<i class="ti-download text-success"></i>
													<?php } else { ?>
														<i class="ti-upload text-danger"></i>
													<?php } ?>
												</td>
                                                <td><?php echo $row->keterangan;?></td>
												<td><?php echo $row->waktu;?></td>
											</tr>
										<?php
											}
										?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<?php if ($this->session->userdata('kode_group') == 1) { ?>
				<div class="col-lg-6">
					<div class="card-box">
						<h4 class="m-t-0 m-b-20 header-title"><b>Riwayat Modul dan Otoritas</b></h4>
						<div class="nicescroll mx-box">
							<div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
										<?php
											foreach($list_history_modul->result()as $row) { ?>
											<tr>
												<td>
													<?php if ($row->jenis=='Update') { ?> 
														<i class="ti-download text-success"></i>
													<?php } else { ?>
														<i class="ti-upload text-danger"></i>
													<?php } ?>
												</td>
                                                <td><?php echo $row->keterangan;?></td>
												<td><?php echo $row->waktu;?></td>
											</tr>
										<?php
											}
										?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				
			</div> <!-- row -->

		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- content page -->

<?php }?>