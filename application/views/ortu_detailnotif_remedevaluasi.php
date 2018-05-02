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
											<td>Nilai Remidi</td>
                                            <td>:</td>
											<td><?php echo $_GET['nilai']; ?></td>
                                        </tr>
										<tr>
											<td>KKM</td>
                                            <td>:</td>
											<td><?php echo $_GET['kkm']; ?></td>
                                        </tr>
										
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