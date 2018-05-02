<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pemberitahuan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Nis <?php echo $_GET['nis']; ?>, Nama <?php echo $_GET['nama']; ?>, Semester <?php echo $_GET['semester']; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    
                                        <tr>
                                            <td>Mata Pelajaran</td>
                                            <td>:</td>
											<td><?php echo $_GET['mapel']; ?></td>
										</tr>
										<tr>
											<td>Bab </td>
                                            <td>:</td>
											<td><?php echo $_GET['bab']; ?></td>
										</tr>
										<tr>
											<td>Nilai Evaluasi</td>
                                            <td>:</td>
											<td><?php echo $_GET['nilai']; ?></td>
                                        </tr>
										<tr>
											<td>KKM</td>
                                            <td>:</td>
											<td><?php echo $_GET['kkm']; ?></td>
                                        </tr>
										<?php if($_GET['nilai'] < $_GET['kkm']){ ?>
										<tr>
											<td>Keterangan</td>
											<td>:</td>
											<td>REMEDIAL</td>
                                        </tr>
										<tr>
											<td>Jadwal Remedial</td>
                                            <td>:</td>
											<td><?php foreach($list->result() as $jadwal){
											echo date('l, d F Y',strtotime($jadwal->jadwal));
											?>, Jam <?php if ($jadwal->jam<10 and $jadwal->mnt < 10){
											echo "0".$jadwal->jam.":0".$jadwal->mnt; }
											else if ($jadwal->jam>=10 and $jadwal->mnt < 10){
											echo $jadwal->jam.":0".$jadwal->mnt; }
											else if ($jadwal->jam<10 and $jadwal->mnt >= 10){
											echo "0".$jadwal->jam.":".$jadwal->mnt; }
											else if ($jadwal->jam>=10 and $jadwal->mnt >= 10) {
											echo $jadwal->jam.":".$jadwal->mnt; } } ?>
											</td>
										</tr>
										<?php } ?>
                                </table>
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