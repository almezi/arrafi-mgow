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
                          <?php echo $_GET['nama']; ?>, Saat Ini Kelas <?php echo $_GET['kelas']; ?>  
						   <a style="float:right;" href="<?php echo base_url()?>index.php/orang_tua/info_pilih_siswa"> <button type="button" class="btn btn-warning">Menu Siswa</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
							<div style="width: 200px; height: 50px;">
							<form role="form" action="<?php echo base_url()?>index.php/orang_tua/info_pilih_mapel?nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&kelas=<?php echo $_GET['kelas']; ?>&thnajar=x&semester=" method='post' enctype='multipart/form-data'>
										<div class="form-group has-success" >
											<select class="form-control" name='thnajar' onchange="this.form.submit()">
												<?php if ($_GET['thnajar'] != null and $_GET['thnajar'] != "x"){ ?>
												 <option value=""><?php echo $_GET['thnajar']; ?> </option> 
												<?php } else if ($_GET['thnajar'] == null){ ?>
													<option value="">-pilih tahun ajaran-</option>
												<?php } else if ($_GET['thnajar'] == "x"){ ?>
													<option value=""><?php echo $_POST['thnajar']; ?> </option>
												<?php } ?>
											<?php foreach($thn->result() as $row){ ?>
											<option value="<?php echo $row->thnajar; ?>"><?php echo $row->thnajar; ?></option>
											<?php } ?>
											</select>
										</div>
							</form>
						  <b>Tahun Ajaran <?php 
						  if ($_GET['thnajar'] != null and $_GET['thnajar'] != "x"){
						  echo $_GET['thnajar']; 
						  }
						  else {
						  echo $_POST['thnajar'];
						  }
						  ?></b> 
							</div>
							<br>	<br>
							
							<div style="width: 200px; height: 50px;">
							<form role="form" action="<?php echo base_url()?>index.php/orang_tua/info_pilih_mapel?nis=<?php echo $_GET['nis']; ?>&kelas=<?php echo $_GET['kelas']; ?>&nama=<?php echo $_GET['nama']; ?>&semester=x&thnajar=
							<?php 
						  if ($_GET['thnajar'] != null and $_GET['thnajar'] != "x"){
						  echo $_GET['thnajar']; 
						  }
						  else {
						  echo $_POST['thnajar'];
						  }
						  ?>" method='post' enctype='multipart/form-data'>
										<div class="form-group has-success" >
											<select class="form-control" name='semester' onchange="this.form.submit()">
												<?php if ($_GET['semester'] != null and $_GET['semester'] != "x"){ ?>
												 <option value=""><?php echo "semester ".$_GET['semester']; ?> </option> 
												<?php } else if ($_GET['semester'] == null){ ?>
													<option value="">-pilih semester-</option>
												<?php } else if ($_GET['semester'] == "x"){ ?>
													<option value=""><?php echo "semester ".$_POST['semester']; ?> </option>
												<?php } ?>
											<?php if($sem->num_rows()!=0){ ?>
											<?php foreach($sem->result() as $row){ ?>
											<option value="<?php echo $row->semester; ?>">semester <?php echo $row->semester; ?></option>
											<?php } ?>
											<?php } ?>
										</select>
										</div>
							</form>
						  <b>Semester <?php 
						  if ($_GET['semester'] != null and $_GET['semester'] != "x"){
						  echo $_GET['semester']; 
						  }
						  else {
						 echo $_POST['semester'];
						  }
						  ?></b> 
							</div>
                            <center>
							<div>  
							<?php foreach($list->result() as $row){ ?>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/orang_tua/info_detil_nilai?nis=<?php echo $_GET['nis']; ?>&nama=<?php echo $_GET['nama']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php 
									if ($_GET['semester'] != null and $_GET['semester'] != "x"){
										echo $_GET['semester']; 
									}
									else{
										echo $_POST['semester']; 
									}
									?>&idmapel=<?php echo $row->idmapel ?>&namamapel=<?php echo $row->nama ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-success"><img src="<?php echo base_url(); ?>logo/view_doc.png" style="height:30px; width:30px;"/>Mapel <?php echo $row->nama ?></button></a>
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