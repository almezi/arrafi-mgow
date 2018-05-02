<?php foreach($listSaranWali as $row) { ?>
		<?php $kelas=$row->kelas?>
		<?php $nama_p=$row->nama_pembahasan?>
<?php } ?>
<?php $tanggal=date('d-M-Y');
		$Tawal=$this->uri->segment(3);
		$Takhir=$this->uri->segment(4);;
?>
<?php if($Tawal == $Takhir) { ?>
	<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename= Laporan ($nama_p) Excel Wali Kelas $kelas dari tanggal $Tawal.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	?>
<?php } else { ?>
	<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename= Laporan ($nama_p) Wali Kelas $kelas dari tanggal $Tawal - $Takhir.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	?>
<?php }  ?>
<table border='1' wtanggalth="70%" >
<tr>
	<?php foreach($listSaranWali as $row) { ?>
		<th colspan=4>Dari Wali Kelas <?php echo $row->nama ?> <br>
		Kelas : <?php echo $row->kelas ?> <?php $nip=$row->nip ?> <br>
		Pembahasan : <?php echo $row->nama_pembahasan ?>
		</th>
	<?php } ?>
</tr>
<tr>
	<th colspan=4>Periode : <?php echo date('M-Y')?></th>
</tr>
<tr>
	<th colspan=4>
	<?php if($Tawal == $Takhir) { ?>
		Laporan <?php echo $Tawal; ?>
	<?php } else { ?>
		Laporan dari  <?php echo $Tawal; ?> - <?php echo $Takhir; ?>
	<?php }  ?>
	</th>
</tr>
<tr align=center>
	<th>Tanggal</th>
	<th>Nama Orang Tua</th>
	<th>Nama Siswa</th>
	<th>Tanggapan</th>
</tr>
<?php 
	$ortu=array();
	$tanggapan=array();
	$i=0;
	foreach($listSaran as $row) {
	$ortu[$i]=$row->dari;
	$tanggapan[$i]=$row->isi_respon;
?>                                          
	<tr align=center>
		<td><?php echo $row->tanggal?></td>
		<td><?php echo $ortu[$i]; ?></td>
		<td>
		<?php $nip=$row->nip ?>
		<?php $listSiswa=$this->db->query("
		select s.nama from guru g join wali w on(g.nip=w.nip) join kelas k on(w.idkelas=k.idkelas) 
		join kelas_siswa ks on(ks.idkelas=k.idkelas) join siswa s on(ks.nis=s.nis) join ortu o on(s.idortu=o.idortu) where w.nip='$nip' and o.nama like '%$ortu[$i]%' ");?>
		<?php foreach($listSiswa->result() as $row) { ?>
		<?php echo $row->nama ?>;
		<?php  } ?>
		</td>
		<td><?php echo $tanggapan[$i]; ?></td>
	</tr>
<?php $i++; } ?>
</table>