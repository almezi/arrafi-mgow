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
				<?php 
			$namamapel='';
			foreach($getmapel->result() as $row){
				$namamapel=$row->nama;
			}
			?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pilih Siswa, Kelas <?php echo $_GET['namakelas']; ?>, Semester <?php echo $_GET['semester']; ?>
						   <a style="float:right;" href="<?php echo base_url()?>index.php/guru/wali_infokelas_semester?idkelas=<?php echo $_GET['idkelas']; ?>&namakelas=<?php echo $_GET['namakelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>"> <button type="button" class="btn btn-warning">Menu Semester</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
							<center>
							<div style="width: 200px; height: 100px;">
							<form role="form" action="<?php echo base_url()?>index.php/guru/wali_infokelas_siswa?idkelas=<?php echo $_GET['idkelas']; ?>&namakelas=<?php echo $_GET['namakelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&semester=<?php echo $_GET['semester']; ?>&idmapel=''" method='post' enctype='multipart/form-data'>
										<div class="form-group has-success" >
											<select class="form-control" name='idmapel' onchange="this.form.submit()">
											<?php if ($_GET['idmapel']=="''"){ ?> 
											<option value=""><?php echo $namamapel; ?></option>
											<?php } else if ($_GET['x']==1){ ?>
											<option value="">-pilih pelajaran-</option>
											<?php } else if ($_GET['idmapel']!="''"){ ?> 
											<option value=""><?php echo $_GET['namamapel']; ?></option>
											<?php } ?>
											<?php foreach($mapel->result() as $row){?>
											<option value="<?php echo $row->idmapel; ?>"><?php echo $row->nama; ?></option>
											<?php } ?>
											</select>
										</div>
									</form>
								<b>Pelajaran <?php 
									if ($_GET['namamapel'] == null){
										echo $namamapel;
									}
									else {
										echo $_GET['namamapel'];
									}
								?></b>
							</div>
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
                                    <?php 
									error_reporting (0);
									if($_GET['idmapel'] != null){
									foreach($list->result() as $row){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row->nis; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td align="center">
											<a href="<?php echo base_url()?>index.php/guru/wali_infokelas_nilai?idmapel=<?php 
											if ($_GET['idmapel'] == "''"){
												echo $_POST['idmapel'];
											}
											else {
												echo $_GET['idmapel'];
											}
											?>&namamapel=<?php 
											 if ($_GET['namamapel'] == null){
												echo $namamapel;
											}
											else {
												echo $_GET['namamapel'];
											} 
											?>&idkelas=<?php echo $_GET['idkelas']; ?>&namakelas=<?php echo $_GET['namakelas']; ?>&nis=<?php echo $row->nis; ?>&nama=<?php echo $row->nama; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&semester=<?php echo $_GET['semester']; ?>" class="text-success"><img src="<?php echo base_url(); ?>logo/view_doc.png" style="height:30px; width:30px;"/></a>
											</td>
                                        </tr>
									<?php } }?>
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