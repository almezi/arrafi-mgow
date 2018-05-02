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
                         Pilih Siswa, Pelajaran <?php echo $_GET['namamapel']; ?>, Semester <?php echo $_GET['semester']; ?>, Kelas <?php echo $_GET['kelas']; ?> 
						   <a style="float:right;" href="<?php echo base_url()?>index.php/guru/guru_inputremed_pilihbab?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>"> <button type="button" class="btn btn-success">Menu Tipe</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
							<center>
							<div style="width: 200px; height: 50px;">
							<form role="form" action='<?php echo base_url()?>index.php/guru/guru_inputremed_pilihsiswa?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&idbab=""&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>' method='post' enctype='multipart/form-data'>
										<div class="form-group has-success" >
											<select class="form-control" name='idbab' onchange="this.form.submit()">
											<?php if( $_GET['idbab']=='""')
											{?>
											<option value=""><?php echo $namabab; ?></option>
											<?php } else 
											{ ?>
											<option value="">-pilih bab-</option>
											<?php } ?>
											<?php foreach($bab->result() as $row){?>
											<option value="<?php echo $row->idbab; ?>"><?php echo $row->nama; ?></option>
											<?php } ?>
											</select>
										</div>
									</form>
							<b>Remedial Bab <?php echo $namabab; ?></b>
							</div>
							<div class="dataTable_wrapper">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
											<th>Nilai Remidi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($list->result() as $row){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row->nis; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            
                                            <td align="center">
											<form role="form" id='formnilai' action="<?php echo base_url() ?>index.php/guru/guru_inputremed_eval?idmapel=<?php echo $_GET['idmapel']; ?>&namamapel=<?php echo $_GET['namamapel']; ?>&idkelas=<?php echo $_GET['idkelas']; ?>&kelas=<?php echo $_GET['kelas']; ?>&idbab=<?php echo $idbab; ?>&bab=<?php echo $namabab; ?>&tingkat=<?php echo $_GET['tingkat']; ?>&semester=<?php echo $_GET['semester']; ?>&tipe=<?php echo $_GET['tipe']; ?>&thnajar=<?php echo $_GET['thnajar']; ?>" method='post' enctype='multipart/form-data'>
											<div class="form-group has-success">
											<input type="hidden" name="idbab" class="form-control" id="inputSuccess" value="<?php echo $idbab; ?>">
											<input type="hidden" name="nis" class="form-control" id="inputSuccess" value="<?php echo $row->nis;  ?>" readonly>
											<input type="hidden" name="semester" class="form-control" id="inputSuccess" value="<?php echo $_GET['semester']; ?>">
                                            <input type="decimal" style='width:100px;' name="nilai" class="form-control" id="inputSuccess" min='0' max='100' value='<?php echo $row->nilai; ?>'  onchange="progressChange(this)" required>
										   
											</div>
											</form>
											</td>
                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
							<?php	
		$kkm=0;
		$jum=0;
		foreach($this->m_guru->wali_babdkn($thnajar, $idmapel, $idkelas, $semester)->result() as $row){ 
		$kkm = $row->kkm;
		foreach($this->m_guru->guru_info_pilihsiswa()->result() as $sis){
			if($this->m_guru->wali_evaldkn($sis->nis,$row->idbab)->num_rows()==0){
				$jum++;
			}
			else{
			foreach ($this->m_guru->wali_evaldkn($sis->nis,$row->idbab)->result() as $nil){
			if($nil->nilai < $kkm){
				$jum++;
			}
			} 
			}
		}
		}		
		foreach($this->m_guru->guru_info_pilihsiswa()->result() as $row){ 
		
		foreach ($this->m_guru->wali_akhirdkn($row->nis,$thnajar, $semester,$idmapel)->result() as $nilai){
			if($nilai->rata < $kkm){
				$jum++;
			}
		} 
		}
		foreach($this->m_guru->guru_info_pilihsiswa()->result() as $row){ 
		if ($this->m_guru->wali_akhirdkn($row->nis, $thnajar, $semester,$idmapel)->num_rows()==0){
			$jum++;
		}
		else{
		foreach ($this->m_guru->wali_akhirdkn($row->nis, $thnajar, $semester,$idmapel)->result() as $nilai){
			if($nilai->pmp < $kkm){
				$jum++;
			}
		} 
		}
		}
		foreach($this->m_guru->guru_info_pilihsiswa()->result() as $row){ 
		foreach ($this->m_guru->wali_akhirdkn($row->nis, $thnajar, $semester,$idmapel)->result() as $nilai){
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