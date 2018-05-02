<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Nilai Sikap dan Karakter</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pilih Siswa, Kelas <?php echo $_GET['kelas']; ?>, Semester <?php echo $_GET['semester']; ?>
						   <a style="float:right;" href="<?php echo base_url()?>index.php/guru/wali_sikap_semester"> <button type="button" class="btn btn-warning">Menu Semester</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
							<center>
							<div class="dataTable_wrapper">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($list->result() as $row){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row->nis; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td align="center">
											<a href="<?php echo base_url()?>index.php/guru/wali_sikap_form?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&nis=<?php echo $row->nis; ?>&nama=<?php echo $row->nama; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester'];?>&tipe=<?php echo $_GET['tipe']; ?>" class="text-success"><img src="<?php echo base_url(); ?>logo/c2-report.png" style="height:30px; width:30px;"/></a>
											</td>
                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
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