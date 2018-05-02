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
			<?php error_reporting(0); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pilih Siswa, Pelajaran <?php echo $_GET['namamapel']; ?>, Kelas <?php echo $_GET['kelas']; ?> 
						   <a style="float:right;" href="<?php echo base_url()?>index.php/guru/guru_info_pilihkelas?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>"> <button type="button" class="btn btn-warning">Menu Kelas</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
							<center>
							<div style="width: 200px; height: 50px;">
							<form role="form" action="<?php echo base_url()?>index.php/guru/guru_info_pilihsiswa?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&semester=''" method='post' enctype='multipart/form-data'>
										<div class="form-group has-success" >
											<select class="form-control" name='semester' onchange="this.form.submit()">
											<?php if( $_POST['semester']!=NULL)
											{?>
											<option value=""><?php echo "semester ".$_POST['semester']; ?></option>
											<?php } else if( $_GET['semester']!="''")
											{?>
											<option value=""><?php echo "semester ".$_GET['semester']; ?></option>
											<?php } else 
											{ ?>
											<option value="">-pilih semester-</option>
											<?php } ?>
											<?php
											if ($_GET['tipe']=='Reguler' or $_GET['tipe']=='Bilingual'){
											?>
											<option value="<?php echo ($_GET['tingkat']*2)-1; ?>">Semester <?php echo ($_GET['tingkat']*2)-1; ?>
											<option value="<?php echo ($_GET['tingkat']*2); ?>">Semester <?php echo ($_GET['tingkat']*2); ?>	
											<?php } 
											else if($_GET['tingkat']==4 and $_GET['tipe']=='Akselerasi'){ ?>
											<option value="<?php echo ($_GET['tingkat']*2); ?>">Semester <?php echo ($_GET['tingkat']*2); ?>
											<option value="<?php echo ($_GET['tingkat']*2)+1; ?>">Semester <?php echo ($_GET['tingkat']*2)+1; ?>
											<option value="<?php echo ($_GET['tingkat']*2)+2; ?>">Semester <?php echo ($_GET['tingkat']*2)+2; ?>
											<?php } 
											else if($_GET['tingkat']==3 and $_GET['tipe']=='Akselerasi'){ ?>
											<option value="<?php echo ($_GET['tingkat']*2)-1; ?>">Semester <?php echo ($_GET['tingkat']*2)-1; ?>
											<option value="<?php echo ($_GET['tingkat']*2); ?>">Semester <?php echo ($_GET['tingkat']*2); ?>
											<option value="<?php echo ($_GET['tingkat']*2)+1; ?>">Semester <?php echo ($_GET['tingkat']*2)+1; ?>
											<?php } ?>
											</select>
										</div>
									</form>
									<b>Semester 
									<?php error_reporting(0);
									if ($_GET['semester'] == "''"){ 
									echo $_POST['semester'];
									} 
									else{
									echo $_GET['semester'];
									}
									?>
									</b>
							
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
									<?php if($_GET['semester'] != null){ 
                                     foreach($list->result() as $row){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row->nis; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td align="center">
											<a href="<?php echo base_url()?>index.php/guru/guru_info_nilai?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nis=<?php echo $row->nis; ?>&nama=<?php echo $row->nama; ?>&semester=<?php 
											if ($_GET['semester']==null or $_GET['semester']=="''"){
											echo $_POST['semester']; 
											}
											else {
											echo $_GET['semester']; 
											}
											?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>" class="text-success"><img src="<?php echo base_url(); ?>logo/view_doc.png" style="height:30px; width:30px;"/></a>
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
        
            <!-- /.row -->
		</div>
	</div>
</div>