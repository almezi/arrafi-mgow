<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Nilai Remedial</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pelajaran <?php echo $_GET['namamapel']; ?>, Kelas <?php echo $_GET['kelas']; ?>, Remedial Bab <?php echo $_GET['bab']; ?>
						   <a style="float:right;" href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihsiswa?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&idbab=<?php echo $_GET['idbab']; ?>&bab=<?php echo $_GET['bab']; ?>"> <button type="button" class="btn btn-warning">Menu Siswa</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <center>
							<div style="width: 300px; height: 150px;">
							<form role="form" action='<?php echo base_url() ?>index.php/guru/guru_inputremed_eval?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&idbab=<?php echo $_GET['idbab']; ?>&bab=<?php echo $_GET['bab']; ?>' method='post' enctype='multipart/form-data'>
                                        <div class="form-group has-success">
											<input type="hidden" name="idbab" class="form-control" id="inputSuccess" value="<?php echo $_GET['idbab']; ?>">
											<input type="text" name='nis' class="form-control" id="inputSuccess" value="<?php echo $_GET['nis']; ?>" readonly>
											<input type="text" class="form-control" id="inputSuccess" value="<?php echo $_GET['nama']; ?>" readonly>
											<label class="control-label" for="inputSuccess">Nilai</label>
                                            <input type="decimal" name='nilai' class="form-control" id="inputSuccess" required>
										    <input type="submit" style="float:right; background:#728C00;" class="btn-success" value="Save" />
                                        </div>
                            </form>
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
        
            <!-- /.row -->
		</div>
	</div>
</div>