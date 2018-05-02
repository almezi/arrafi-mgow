<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

	<!-- Start content -->
    <div class="content">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Nilai Siswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading">
						 Pilih Pelajaran, Kelas <?php echo $_GET['kelas']; ?>, Semester <?php echo $_GET['semester']; ?>
						 <a style="float:right;" href="<?php echo base_url()?>index.php/guru/wali_laporan_semester"> <button type="button" class="btn btn-warning">Menu Semester</button></a>
						</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <center>
							<div>    
							<?php foreach($map->result() as $row){ ?>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_laporan_pilih?idmapel=<?php echo $row->idmapel; ?>&namamapel=<?php echo $row->mapel; ?>&idkelas=<?php echo $row->idkelas; ?>&kelas=<?php echo $row->kelas; ?>&semester=<?php echo $_GET['semester']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>"> <button type="button" class="btn btn-success"> <?php echo $row->mapel; ?></button></a>
								</div>
							<?php } 
	$jum=0;
	foreach($this->m_database->guru_info_pilihsiswa()->result() as $row){ 
		foreach($this->m_database->wali_laporan_mapel()->result() as $m){ 
		if ($this->m_database->nilaiakhir_leger($row->nis,$m->idmapel)->num_rows()==0){
			$jum++;
		}
		else{
		foreach ($this->m_database->wali_legerkkm($m->idmapel)->result() as $k){
			foreach ($this->m_database->nilaiakhir_leger($row->nis,$m->idmapel)->result() as $nil){
			if($nil->akhir < $k->kkm){
			$jum++;
			}
			}
		}
		}
		}
		}if($jum > 0){?>
							<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/cek_leger?&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $_GET['semester']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&cek=1" onclick="javascript: return confirm('Ada nilai yang masih dibawah KKM, apakah yakin akan lanjutkan?')"> <button type="button" class="btn btn-primary" target="_blank"> <img src="<?php echo base_url(); ?>logo/icon_180.png" style="height:30px; width:30px;"/>Leger</button></a>
								</div>
				<?php } else {?>
                            <div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_laporanleger?&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $_GET['semester']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>"> <button type="button" class="btn btn-primary" target="_blank"> <img src="<?php echo base_url(); ?>logo/icon_180.png" style="height:30px; width:30px;"/>Leger</button></a>
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