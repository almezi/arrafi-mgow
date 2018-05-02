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
                           Pelajaran <?php echo $_GET['namamapel']; ?>, Kelas <?php echo $_GET['kelas']; ?>, Semester <?php echo $_GET['semester']; ?>, <?php echo $_GET['nis']; ?>, <?php echo $_GET['nama']; ?>
						    <a style="float:right;" href="<?php echo base_url()?>index.php/guru/guru_info_pilihsiswa?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $_GET['semester']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>"> <button type="button" class="btn btn-success">Menu Siswa</button></a>
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
											<td>Uji Kompetensi</td>
											<td>:</td>
											<td><?php echo $row->pmp; ?></td>
                                        </tr>
										<tr>
											<td>Rata-Rata Nilai Bab</td>
                                            <td>:</td>
											<td><?php echo $row->rata; ?></td>
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
        
            <!-- /.row -->
		</div>
	</div>
</div>