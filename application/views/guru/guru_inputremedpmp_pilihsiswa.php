<script type="text/javascript" >
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
                    <h1 class="page-header">Input Nilai Remedial</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pilih Siswa, Pelajaran <?php echo $_GET['namamapel']; ?>, Semester <?php echo $_GET['semester']; ?>, Kelas <?php echo $_GET['kelas']; ?> 
						   <a style="float:right;" href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-success">Menu Tipe</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
							<center>
							<b>Remedial PMP </b>
							<div class="dataTable_wrapper">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
											<th>Skor</th>
											<th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php foreach($list->result() as $row){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row->nis; ?></td>
                                            <td><?php echo $row->nama; ?></td>
											
                                            <td align="center">
											<form role="form" action='<?php echo base_url() ?>index.php/guru/guru_inputskor_remedpmp?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>' method='post' enctype='multipart/form-data'>
											<div class="form-group has-success">
											<input type="hidden" name="idmapel" class="form-control" id="inputSuccess" value="<?php echo $_GET['idmapel']; ?>">
											<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $row->nis; ?>" >
											<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" >
											<input type="decimal" min='0' style='width:100px;' name="skor" class="form-control" id="inputSuccess" value='<?php echo $row->skor; ?>' onchange="progressChange(this)" required>
											</div>
											</form>
											</td>
											<td align="center">
											<form role="form" action='<?php echo base_url() ?>index.php/guru/guru_inputnilai_remedpmp?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>' method='post' enctype='multipart/form-data'>
											<div class="form-group has-success">
											<input type="hidden" name="idmapel" class="form-control" id="inputSuccess" value="<?php echo $_GET['idmapel']; ?>">
											<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $row->nis; ?>" >
											<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>" >
											<input style='width:100px;' min='0' max='100' type="decimal" name="nilai" class="form-control" id="inputSuccess" value='<?php echo $row->nilai; ?>' onchange="progressChange(this)" required>
										    </div>
											</form>
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
        
            <!-- /.row -->
		</div>
	</div>
</div>