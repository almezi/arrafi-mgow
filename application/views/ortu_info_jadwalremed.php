<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Jadwal Remidial</h1>
					<?php echo $_GET['nama']; ?>, Saat Ini Kelas <?php echo $_GET['kelas']; ?>
					<a style="float:right;" href="<?php echo base_url()?>index.php/orang_tua/nilai_anak"> <button type="button" class="btn btn-warning">Menu Siswa</button></a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               
				 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Evaluasi 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<center>
                           
     
	 <div class="alert alert-success">
	 <div class="dataTable_wrapper">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Pelajaran</th>
                                            <th>Bab</th>
											<th>Semester</th>
											<th>Jadwal</th>
                                        	<th>Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($eval->result() as $row){?>
									<tr class="odd gradeX">
                                            <td><?php echo $row->mapel; ?></td>
                                            <td><?php echo $row->nama; ?></td>
											<td ><?php echo $row->semester; ?></td>
                                        	<td ><?php echo date('l, d F Y',strtotime($row->jadwal)); ?></td>
                                        	<td ><?php 
											if ($row->jam<10 and $row->mnt < 10){
											echo "0".$row->jam.":0".$row->mnt; }
											else if ($row->jam>=10 and $row->mnt < 10){
											echo $row->jam.":0".$row->mnt; }
											else if ($row->jam<10 and $row->mnt >= 10){
											echo "0".$row->jam.":".$row->mnt; }
											else if ($row->jam>=10 and $row->mnt >= 10){
											echo $row->jam.":".$row->mnt; }
											?></td>
                                        </tr>
									<?php } ?>
									</tbody>
                                </table>
                            </div>
	 </div>
	 </center>
	</div>
	</div>
	</div>
	
	<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           PMP 
						   
                        </div>
						
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<center>
	
	 <div class="alert alert-warning">
	 <div class="dataTable_wrapper">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Pelajaran</th>
                                            <th>Semester</th>
											<th>Jadwal</th>
                                        	<th>Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($pmp->result() as $pm){?>
									<tr class="odd gradeX">
                                            <td><?php echo $pm->nama; ?></td>
											<td ><?php echo $pm->semester; ?></td>
                                        	<td ><?php echo date('l, d F Y',strtotime($pm->jadwal)); ?></td>
                                        	<td ><?php 
											if ($pm->jam<10 and $pm->mnt < 10){
											echo "0".$pm->jam.":0".$pm->mnt; }
											else if ($pm->jam>=10 and $pm->mnt < 10){
											echo $pm->jam.":0".$pm->mnt; }
											else if ($pm->jam<10 and $pm->mnt >= 10){
											echo "0".$pm->jam.":".$pm->mnt; }
											else if ($pm->jam>=10 and $pm->mnt >= 10) {
											echo $pm->jam.":".$pm->mnt; }
											?></td>
                                        </tr>
									<?php } ?>
									</tbody>
                                </table>
                            </div>
	 </div>
	 					</center>			
	 </div>
						
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                </div>
                <!-- /.col-lg-6 -->
			</div>
	</div>
</div>