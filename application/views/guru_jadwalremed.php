<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info Jadwal Remedial</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div >
			<?php error_reporting(0); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pelajaran <?php echo $_GET['namamapel']; ?>, Kelas <?php echo $_GET['kelas']; ?> 
						   <a style="float:right;" href="<?php echo base_url()?>index.php/guru/guru_jadwalremed_kelas?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>"> <button type="button" class="btn btn-warning">Menu Kelas</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
							<center>
							<div style="width: 200px; height: 50px;">
							<form role="form" action="<?php echo base_url()?>index.php/guru/guru_jadwalremed?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&semester=''" method='post' enctype='multipart/form-data'>
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
									<b> 
									<?php error_reporting(0);
									if ($_POST['semester']!=NULL){ 
									echo "Semester ".$_POST['semester'];
									} 
									else if( $_GET['semester']!="''"){
									echo "Semester ".$_GET['semester'];
									}
									?>
									</b>
								
							</div>
							<div class="dataTable_wrapper">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tipe</th>
                                            <th>Jadwal</th>
                                            <th>Waktu</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php if($_GET['semester'] != null){ 
                                     foreach($eval->result() as $row){ ?>
                                        <tr class="odd gradeX">
										<form role="form" action='<?php echo base_url() ?>index.php/guru/all_jadremedeval?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&idbab=<?php echo $idbab; ?>&bab=<?php echo $namabab; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=
									<?php if ($_POST['semester']!=NULL){ 
											echo $_POST['semester'];
											} 
										else if( $_GET['semester']!="''"){
											echo $_GET['semester'];
											}
										?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>' method='post' enctype='multipart/form-data'>
                                        	<input type="hidden" name="idbab" class="form-control" id="inputSuccess" value="<?php echo $row->idbab; ?>">
										    <td>Bab <?php echo $row->nama; ?></td>
                                            <td> <input type="date" name="jad" min="<?php $d=strtotime("+1 week"); echo date("Y-m-d", $d) ;?>" class="form-control" id="inputSuccess" value="<?php echo $row->jadwal; ?>" required></td>
                                            <td><input name='jam' style='width:50px' type='number' min='8' max='14'  placeholder='hh' value='<?php 
											if ($row->jam<10){
											echo "0".$row->jam; }
											else {
											echo $row->jam;}?>' id="inputSuccess" required><b>:</b><input name='mnt' style='width:50px' type='number' min='0' max='59' placeholder='mm' id="inputSuccess" value='<?php 
											if ($row->mnt<10){
											echo "0".$row->mnt; }
											else {
											echo $row->mnt; }
											?>' required></td>
                                            <td align="center">
											<input type="submit" style="background:#728C00;" class="btn btn-lg btn-success btn-block" value="Set" />
											</td>
										</form>
                                        </tr>
									<?php } }?>
									<?php if($_GET['semester'] != null){ 
                                     foreach($pmp->result() as $pmp){ ?>
                                        <tr class="odd gradeX">
										<form role="form" action='<?php echo base_url() ?>index.php/guru/all_jadremedpmp?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=
										<?php if ($_POST['semester']!=NULL){ 
											echo $_POST['semester'];
											} 
										else if( $_GET['semester']!="''"){
											echo $_GET['semester'];
											}
										?>&tipe=<?php echo $_GET['tipe']; ?>' method='post' enctype='multipart/form-data'>
                                           <input type="hidden" name="idmapel" class="form-control" id="inputSuccess" value="<?php echo $_GET['idmapel']; ?>">
											<input type="hidden" name="idkelas" class="form-control" id="inputSuccess" value="<?php echo $_GET['idkelas']; ?>">
											<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php if ($_POST['semester']!=NULL){ 
											echo $_POST['semester'];
											} 
											else if( $_GET['semester']!="''"){
											echo $_GET['semester'];
											}
											?>">
										    <td>PMP</td>
                                            <td> <input type="date" name="jad" min="<?php $d=strtotime("tomorrow"); echo date("Y-m-d", $d) ;?>" class="form-control" id="inputSuccess" value="<?php echo $pmp->jadwal; ?>" required></td>
                                            <td><input name='jam' style='width:50px' type='number' min='8' max='14'  placeholder='hh' value='<?php 
											if ($pmp->jam<10){
											echo "0".$pmp->jam; }
											else {
											echo $pmp->jam;}?>' id="inputSuccess" required><b>:</b><input name='mnt' style='width:50px' type='number' min='0' max='59' placeholder='mm' id="inputSuccess" value='<?php 
											if ($pmp->mnt<10){
											echo "0".$pmp->mnt; }
											else {
											echo $pmp->mnt; }
											?>' required></td>
                                            <td align="center">
											<input type="submit" style="background:#728C00;" class="btn btn-lg btn-success btn-block" value="Set" />
											</td>
										</form>
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