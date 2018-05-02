 <html><head>
            </head><body >
			<div style="width: 1000px; margin-left:34px;">
			<div style="float: left; margin-top:16px;">
			<img src="<?php echo base_url(); ?>Gambar/avatar-13.PNG" width="120" height="125" alt="user-img" class="img-circle">
			</div>
			<div style="float:left; margin-left:16px;">
			<h2>SD AR-Rafi Bandung</h2>
			<h2>Periode : <?php echo date('M-Y')?></h2>
			<?php foreach($listLaporan as $row) { ?>
                 <th><h2 class="panel-title" align=center>Tanggal Laporan : <?php echo $row->tanggal_laporan?></h2></th>
			<?php } ?>
			</div>
			<div style="float:left;">
			<p style="border-style: double; border-bottom-color: black;" align=center></p>
			<?php foreach($listLaporan as $row) { ?>
			<h3>
			<center>Laporan Diskusi Orang Tua</center>
				<center>No : <?php echo $row->id_laporan?>/<?php echo date('Y');?></center>
				Kepada Yth.<br>
				&nbsp; &nbsp; &nbsp; Kepada Sekolah SD Ar Rafi<br>
				<p>Perihal : (<?php echo $bahas['nama_pembahasan'];?>) </p>
				<p>Dengan Hormat,<br>
				&nbsp; &nbsp; &nbsp; Telah dilakukan diskusi antara guru dan orang tua, pada :</p>
													<p>Hari : 
													<?php if($bahas_awal['hari'] == 'Mon') { ?>
													Senin, 
													<?php } else if($bahas_awal['hari'] == 'Tue') { ?>
													Selasa,
													<?php } else if($bahas_awal['hari'] == 'Wed') { ?>
													Rabu,
													<?php } else if($bahas_awal['hari'] == 'Thu') { ?>
													Kamis,
													<?php } else if($bahas_awal['hari'] == 'Fri') { ?>
													Jum'at,
													<?php } else if($bahas_awal['hari'] == 'Sat') { ?>
													Sabtu,
													<?php } else  { ?>
													Minggu,
													<?php } ?>
													<?php echo $bahas_awal['tgl'];?><br>
													Waktu Tanggapan : <?php echo $bahas_awal['jam'];?> : <?php echo $bahas_awal['menit'];?> s/d <?php echo $bahas_akhir['jam'];?> : <?php echo $bahas_akhir['menit'];?><br>
													Jumlah Orang Tua : <?php echo $jumlahOrtu;?> Orang<br>
													Jumlah Orang Tua Aktif : <?php echo $jumlahBahas;?> Dari <?php echo $jumlahOrtu;?> Orang</p>
													dari hasil diskusi tersebut didapatkan kesimpulan, bahwa<br>
													<?php echo $row->isi_laporan?>
			</h3>
			<?php } ?>
			<h3>
			<p align=center style="margin-left:430px;"> Bandung, <?php echo date('d-M-Y')?></b><br><br><br><br>
			<p align=center style="margin-left:430px;"><?php echo $user1['nama'];?><br>
			NIP : <?php echo $user1['NIP'];?></p>
			</h3>
			</div>
			</div>
            </body></html>
			<script>
			window.print();
			</script>