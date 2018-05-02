<script type="text/javascript" >
	function checkfile(sender) {
    var validExts = new Array(".csv");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("harap memasukan file dengan tipe " +
               validExts.toString());
		$(sender).val("");
      return false;
    }
    else return true;
	}
	
	function autotab(original,destination){
		if (original.getAttribute&&original.value.length==original.getAttribute("maxlength"))
			destination.focus()
	}
	
	function progressChange(obj) {
        var $form = $(obj).closest('form'); // OR var form = obj.from;
        
        $.ajax({
            type: "POST",
            url: $form.attr('action'),
            data: $form.serialize(),
			refresh: true,
            success: function() {
                
            },
        });
    }
</script>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Nilai Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
            <div class="row">
			<?php 
			$idbab='';
			$namabab='';
			foreach($list->result() as $row){
				$idbab=$row->idbab;
				$namabab=$row->bab;
			}
			?>
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pelajaran <?php echo $_GET['namamapel']; ?>, Semester <?php echo $_GET['semester']; ?>,  Kelas <?php echo $_GET['kelas']; ?>, <b>Evaluasi Bab <?php echo $namabab; ?></b>
						   <a style="float:right;" href="<?php echo base_url()?>index.php/guru/guru_input_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-success">Menu Tipe</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <center>
							<div style="width: 300px; height: 200px;">
							<form role="form" action='<?php echo base_url()?>index.php/guru/guru_input_pilihsiswa?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&idbab=""&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>' method='post' enctype='multipart/form-data'>
										<div class="form-group has-success" >
											<select class="form-control" name='idbab' onchange="this.form.submit()">
											<?php error_reporting(0);
											if( $_GET['idbab']=='""')
											{?>
											<option value=""><?php echo $namabab; ?></option>
											<?php } else if(isset( $_GET['bab']))
											{?>
											<option value=""><?php echo $_GET['bab']; ?></option>
											<?php } else { ?>
											<option value="">-pilih bab-</option>
											<?php } ?>
											<?php foreach($bab->result() as $row){?>
											<option value="<?php echo $row->idbab; ?>"><?php echo $row->nama; ?></option>
											<?php } ?>
											</select>
										</div>
							</form>
							<?php 
							$jadwal='';
							$jam=0;
							$mnt=0;
							foreach($jad->result() as $row){
							$jadwal=$row->jadwal;
							$jam=$row->jam;
							$mnt=$row->mnt;
							}
							if($_GET['idbab']=="''"){
							
							}
							else if ($jadwal != null or $jadwal == null){
							?>
									<div class="col-xs-12 col-md-8">
									<form role="form" action='<?php echo base_url() ?>index.php/guru/jadremedeval?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&idbab=<?php echo $idbab; ?>&bab=<?php echo $namabab; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>' method='post' enctype='multipart/form-data'>
                                        <div class="form-group has-success" >
                                            <label class="control-label" for="inputSuccess">Jadwal Remedial</label>
											<input type="hidden" name="idbab" class="form-control" id="inputSuccess" value="<?php echo $idbab; ?>">
											
                                            <input type="date" name="jad" min="<?php $d=strtotime("+1 week"); echo date("Y-m-d", $d) ;?>" class="form-control" id="inputSuccess" value="<?php echo $jadwal; ?>" required>
											<b>Jam</b> <input name='jam' placeholder='00' style='width:50px' type='number'  min='8' max='14'  placeholder='hh' value='<?php 
											if ($jam<10){
											echo "0".$jam; }
											else {
											echo $jam;}?>' id="inputSuccess" required><b>:</b>
											<input name='mnt' placeholder='00' style='width:50px' type='number'  min='0' max='59' placeholder='mm' id="inputSuccess" value='<?php 
											if ($mnt<10){
											echo "0".$mnt; }
											else {
											echo $mnt; }
											?>' required>
										    <input type="submit" style="background:#728C00;" class="btn btn-lg btn-success btn-block" value="Set" />
                                        </div>
									</form>
									<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
										Cek Jadwal
									</button>
									</div>
									<div class="col-xs-6 col-md-4">
									<form  role="form" id='formnilai' action="<?php echo base_url() ?>index.php/guru/guru_uploadeval?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&idbab=<?php echo $idbab; ?>&bab=<?php echo $namabab; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>" method='post' enctype='multipart/form-data'>
										<div class="form-group has-success">
										<label class="control-label" for="inputSuccess">file csv</label>
											<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>">
											<input type="hidden" name="idbab" class="form-control" id="inputSuccess" value="<?php echo $idbab; ?>">
										<input type='file' accept=".csv" class="btn btn-outline btn-white btn-sm" name='filename' onchange="checkfile(this);" required>
										<input type='submit' class="btn btn-outline btn-success" name='submit' value='Upload'>
										</div>
									</form>
							<a href="<?php echo base_url() ?>index.php/guru/formatbab_csv?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&idbab=<?php echo $idbab; ?>&bab=<?php echo $namabab; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"><button class="btn btn-info btn-sm" >
                                Format File
                            </button></a>
							
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Jadwal Remedial Evaluasi</h4>
											<h5>Kelas <?php echo $_GET['kelas']; ?>, Semester <?php echo $_GET['semester']; ?></h5>  
                                        </div>
                                        <div class="modal-body">
                               <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
											<th>Pelajaran</th>
                                            <th>Bab</th>
											<th>Jadwal</th>
                                        	<th>Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($eval->result() as $row){?>
									<tr class="odd gradeX">
                                            <td><?php echo $row->mapel; ?></td>
											<td><?php echo $row->nama; ?></td>
											<td ><?php echo date('l, d F Y',strtotime($row->jadwal)); ?></td>
                                        	<td ><?php 
											if ($row->jam<10 and $row->mnt < 10){
											echo "0".$row->jam.":0".$row->mnt; }
											else if ($row->jam >= 10 and $row->mnt < 10){
											echo $row->jam.":0".$row->mnt; }
											else if ($row->jam < 10 and $row->mnt >= 10){
											echo "0".$row->jam.":".$row->mnt; }
											else if ($row->jam >= 10 and $row->mnt >= 10){
											echo $row->jam.":".$row->mnt; }
											?></td>
                                        </tr>
									<?php } ?>
									</tbody>
                                </table>
                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- Modal -->
                            
							<?php  }
							
							?>
							
							</div>
							
							</center>
							<center>
							<div class="dataTable_wrapper">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
											<th>Nilai</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($list->result() as $row){ ?>
                                        <tr >
                                            <td><?php echo $row->nis; ?></td>
                                            <td><?php echo $row->nama; ?></td>
											<td align="center">
											<form role="form" id='formnilai' action="<?php echo base_url() ?>index.php/guru/guru_inputnilai_eval?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&idbab=<?php echo $idbab; ?>&bab=<?php echo $namabab; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>" method='post' enctype='multipart/form-data'>
											<div class="form-group has-success">
											<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>">
											<input type="hidden" name="idbab" class="form-control" id="inputSuccess" value="<?php echo $idbab; ?>">
											<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $row->nis;  ?>" readonly>
											
                                            <input type="decimal" style='width:100px;' name="nilai" class="form-control" id="nilai" min="0" max='100' value='<?php echo $row->nilai; ?>'  onchange="progressChange(this)" required>
										   
											</div>
											</form>
											</td>
                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
							<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_laporandkn?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $_GET['semester']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>"> <button type="button" class="btn btn-warning" target="_blank"><img src="<?php echo base_url(); ?>logo/icon_180.png" style="height:30px; width:30px;"/> Laporan DKN</button></a>
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