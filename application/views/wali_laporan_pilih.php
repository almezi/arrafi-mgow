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
                          Pilih Jenis Laporan, Kelas <?php echo $_GET['kelas']; ?>, Semester <?php echo $_GET['semester']; ?> 
						    <a style="float:right;" href="<?php echo base_url()?>index.php/guru/wali_laporan_mapel?idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $_GET['semester']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>"> <button type="button" class="btn btn-success">Menu Pelajaran</button></a>
						</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <center>
							<b>Pelajaran <?php echo $_GET['namamapel']; ?></b><br/><br/> 
							<div> 
		<?php	
		$kkm=0;
		$jum=0;
		foreach($this->m_database->wali_babdkn()->result() as $row){ 
		$kkm = $row->kkm;
		foreach($this->m_database->guru_info_pilihsiswa()->result() as $sis){
			if($this->m_database->wali_evaldkn($sis->nis,$row->idbab)->num_rows()==0){
				$jum++;
			}
			else{
			foreach ($this->m_database->wali_evaldkn($sis->nis,$row->idbab)->result() as $nil){
			if($nil->nilai < $kkm){
				$jum++;
			}
			} 
			}
		}
		}		
		foreach($this->m_database->guru_info_pilihsiswa()->result() as $row){ 
		foreach ($this->m_database->wali_akhirdkn($row->nis)->result() as $nilai){
			if($nilai->rata < $kkm){
				$jum++;
			}
		} 
		}
		foreach($this->m_database->guru_info_pilihsiswa()->result() as $row){ 
		if ($this->m_database->wali_akhirdkn($row->nis)->num_rows()==0){
			$jum++;
		}
		else{
		foreach ($this->m_database->wali_akhirdkn($row->nis)->result() as $nilai){
			if($nilai->pmp < $kkm){
				$jum++;
			}
		} 
		}
		}
		foreach($this->m_database->guru_info_pilihsiswa()->result() as $row){ 
		foreach ($this->m_database->wali_akhirdkn($row->nis)->result() as $nilai){
			if($nilai->akhir < $kkm){
				$jum++;
			}
		} 
		}
		if($jum > 0){?>
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/cek_dkn?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $_GET['semester']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&cek=1" onclick="javascript: return confirm('Ada nilai yang masih dibawah KKM, apakah yakin akan lanjutkan?')" > <button type="button" class="btn btn-warning" target="_blank"><img src="<?php echo base_url(); ?>logo/icon_180.png" style="height:30px; width:30px;"/> Laporan DKN</button></a>
								</div>
		<?php }else { ?>
				
								<div style="margin:auto; border-radius:50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_laporandkn?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $_GET['semester']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>"> <button type="button" class="btn btn-warning" target="_blank"><img src="<?php echo base_url(); ?>logo/icon_180.png" style="height:30px; width:30px;"/> Laporan DKN</button></a>
								</div>
		<?php } ?>
								<div style="margin:auto; border-radius: 50px; height:50px; display:block;">
                                	<a href="<?php echo base_url()?>index.php/guru/wali_laporanpmp?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&semester=<?php echo $_GET['semester']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>"> <button type="button" class="btn btn-warning" target="_blank"><img src="<?php echo base_url(); ?>logo/icon_180.png" style="height:30px; width:30px;"/> Laporan PMP</button></a>
								</div>
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