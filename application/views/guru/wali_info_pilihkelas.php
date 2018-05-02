<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info Nilai Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pilih Kelas, Pelajaran <?php echo $_GET['namamapel']; ?> <a style="float:right;" href="<?php echo base_url()?>guru/nilai_siswa"> <button type="button" class="btn btn-success">Menu</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <center>
							<div>            
							<?php foreach($list->result() as $row){ ?>																
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>guru/wali_info_pilihsiswa?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $row->idkelas; ?>&kelas=<?php echo $row->nama; ?>&tingkat=<?php echo $row->tingkat; ?>&tipe=<?php echo $row->tipe; ?>&semester=x"> <button type="button" class="btn btn-warning">Kelas <?php echo $row->nama; ?></button></a>
								</div>
							<?php } ?>
                            </div>
							</center>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
	</div>
</div>