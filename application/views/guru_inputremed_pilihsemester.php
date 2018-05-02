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
                          Pilih Semester, Pelajaran <?php echo $_GET['namamapel']; ?>, Kelas <?php echo $_GET['kelas']; ?> <a style="float:right;" href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihkelas?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-success">Menu Kelas</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <center>
							<div>
							<?php
							$ganjil=($_GET['tingkat']*2)-1;
							$genap=($_GET['tingkat']*2);
							if ($_GET['tipe']=='Reguler' or $_GET['tipe']=='Bilingual'){
							?>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $ganjil; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo $ganjil; ?></button></a>
								</div>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $genap; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo $genap; ?></button></a>
								</div>
							<?php } 
							else if($_GET['tingkat']==4 and $_GET['tipe']=='Akselerasi'){ ?>
							<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo 8; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 8; ?></button></a>
								</div>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo 9; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 9; ?></button></a>
								</div>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo 10; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 10; ?></button></a>
								</div>
							<?php } 
							else if($_GET['tingkat']==3 and $_GET['tipe']=='Akselerasi'){ ?>
							<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo 5; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 5; ?></button></a>
								</div>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo 6; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 6; ?></button></a>
								</div>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo 7; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 7; ?></button></a>
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
        
            <!-- /.row -->
		</div>
	</div>
</div>