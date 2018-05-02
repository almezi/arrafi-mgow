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
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Nama <?php echo $_GET['nama']; ?>, Pelajaran <?php echo $_GET['namamapel']; ?>, Semester <?php echo $_GET['semester']; ?>   
						    <a style="float:right;" href="<?php echo base_url()?>index.php/orang_tua/info_pilih_mapel?nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $_GET['semester']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-success">Menu Mata Pelajaran</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                  <?php foreach($bab->result() as $row){ ?>
                                        <tr>
                                            <td>Bab <?php echo $row->nama; ?></td>
                                            <td>:</td>
											<td><?php echo $row->nilai; ?></td>
										</tr>
								  <?php } ?>
								  <?php foreach($akhir->result() as $row){ ?>
										<tr>
											<td>Rata-Rata Nilai</td>
                                            <td>:</td>
											<td><?php echo $row->rata; ?></td>
										</tr>
										<tr>
											<td>Uji Kompetensi</td>
											<td>:</td>
											<td><?php echo $row->pmp; ?></td>
                                        </tr>
										<tr>
											<td>Nilai Akhir</td>
                                            <td>:</td>
											<td><?php echo $row->akhir; ?></td>
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