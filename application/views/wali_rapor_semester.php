<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rapor Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pilih Semester, Kelas <?php 
						  $kelas='';
						  $idkelas='';
							foreach($list->result() as $row){
							echo $kelas= $row->nama;
							$idkelas= $row->idkelas;
							} ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <center>
							<?php
							$ganjil=0;
							$genap=0;
							$tingkat=0;
							$thnajar='';
							$tipe='';
							foreach($list->result() as $row){
							$ganjil=($row->tingkat*2)-1;
							$genap=($row->tingkat*2);
							$tingkat=$row->tingkat;
							$thnajar=$row->thnajar;
							$tipe=$row->tipe;
							}
							if ($tipe=='Reguler' or $tipe=='Bilingual'){
							?>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_rapor_siswa?semester=<?php echo $ganjil; ?>&idkelas=<?php echo $idkelas; ?>&kelas=<?php echo $kelas; ?>&tingkat=<?php echo $tingkat; ?>&thnajar=<?php echo $thnajar;?>&tipe=<?php echo $tipe; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo $ganjil; ?></button></a>
								</div>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_rapor_siswa?semester=<?php echo $genap; ?>&idkelas=<?php echo $idkelas; ?>&kelas=<?php echo $kelas; ?>&tingkat=<?php echo $tingkat; ?>&thnajar=<?php echo $thnajar;?>&tipe=<?php echo $tipe; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo $genap; ?></button></a>
								</div>
							<?php } 
							else if($tingkat==4 and $tipe=='Akselerasi'){ ?>
							<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_rapor_siswa?semester=<?php echo 8; ?>&idkelas=<?php echo $idkelas; ?>&kelas=<?php echo $kelas; ?>&tingkat=<?php echo $tingkat; ?>&thnajar=<?php echo $thnajar;?>&tipe=<?php echo $tipe; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 8; ?></button></a>
								</div>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_rapor_siswa?semester=<?php echo 9; ?>&idkelas=<?php echo $idkelas; ?>&kelas=<?php echo $kelas; ?>&tingkat=<?php echo $tingkat; ?>&thnajar=<?php echo $thnajar;?>&tipe=<?php echo $tipe; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 9; ?></button></a>
								</div>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_laporan_mapel?semester=<?php echo 10; ?>&idkelas=<?php echo $idkelas; ?>&kelas=<?php echo $kelas; ?>&tingkat=<?php echo $tingkat; ?>&thnajar=<?php echo $thnajar;?>&tipe=<?php echo $tipe; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 10; ?></button></a>
								</div>
							<?php } 
							else if($tingkat==3 and $tipe=='Akselerasi'){ ?>
							<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_rapor_siswa?semester=<?php echo 5; ?>&idkelas=<?php echo $idkelas; ?>&kelas=<?php echo $kelas; ?>&tingkat=<?php echo $tingkat; ?>&thnajar=<?php echo $thnajar;?>&tipe=<?php echo $tipe; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 5; ?></button></a>
								</div>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_rapor_siswa?semester=<?php echo 6; ?>&idkelas=<?php echo $idkelas; ?>&kelas=<?php echo $kelas; ?>&tingkat=<?php echo $tingkat; ?>&thnajar=<?php echo $thnajar;?>&tipe=<?php echo $tipe; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 6; ?></button></a>
								</div>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_rapor_siswa?semester=<?php echo 7; ?>&idkelas=<?php echo $idkelas; ?>&kelas=<?php echo $kelas; ?>&tingkat=<?php echo $tingkat; ?>&thnajar=<?php echo $thnajar;?>&tipe=<?php echo $tipe; ?>"> <button type="button" class="btn btn-warning">Semester <?php echo 7; ?></button></a>
								</div>
							<?php } ?>
							
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