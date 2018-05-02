<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Leger_Kelas ".$_GET['kelas']."_Semester ".$_GET['semester']."_Tahun Ajaran ".$_GET['thnajar'].".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html>
<head>
<title>Download Laporan DKN</title>
</head>

<body>
<div >
<CENTER>
<h2 >DAFTAR NILAI </h2>
<h2>SD AR-RAFI' BANDUNG</h2>
</CENTER>
	<table border='0'>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><?php echo $_GET['kelas']; ?></td>
		</tr>
		<tr>
			<td>Tahun Pelajaran</td>
			<td>:</td>
			<td><?php echo $_GET['thnajar']; ?></td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td><?php echo $_GET['semester']; ?></td>
		</tr>
	</table>
<br>
	<table border='1'>
	<tr>
		<td rowspan="2">No</td>
		<td rowspan="2">No. Induk</td>
		<td rowspan="2">NISN</td>
		<td rowspan="2">Nama Siswa</td>
		<td align='center'>Nilai Mata Pelajaran</td>
	</tr>
	<tr>
		<?php foreach($map->result() as $row){ ?>
			<td align='center'><?php echo $row->mapel; ?></td>
		<?php } ?>
		<td align='center'>JUMLAH</td>
		<td align='center'>Kedisiplinan dan Tanggung Jawab</td>
		<td align='center'>Kebersihan dan Kerapihan</td>
		<td align='center'>Kerjasama</td>
		<td align='center'>Kesopanan</td>
		<td align='center'>Kemandirian</td>
		<td align='center'>Kerajinan</td>
		<td align='center'>Kejujuran</td>
		<td align='center'>Kepemimpinan</td>
		<td align='center'>Ketaatan</td>
		<td align='center'>Sakit</td>
		<td align='center'>Izin</td>
		<td align='center'>Tanpa Keterangan</td>
	</tr>
	<tr>
	
		<td></td>
		<td></td>
		<td></td>
		<td>KKM</td>
		<?php foreach($map->result() as $row){ 
		foreach ($this->m_database->wali_legerkkm($row->idmapel)->result() as $k){?>
		<td><?php echo $k->kkm; ?></td>
		<?php }
		} ?>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<?php 
	$no=1;
	foreach($siswa->result() as $row){ ?>
	<tr>
	
		<td><?php echo $no; ?></td>
		<td><?php echo $row->nis; ?></td>
		<td><?php echo $row->nisn; ?></td>
		<td><?php echo $row->nama; ?></td>
		<?php foreach($map->result() as $m){ 
		if ($this->m_database->nilaiakhir_leger($row->nis,$m->idmapel)->num_rows()==0){
			echo "<td align='center' bgcolor='yellow'></td>";
		}
		else{
		foreach ($this->m_database->wali_legerkkm($m->idmapel)->result() as $k){
			foreach ($this->m_database->nilaiakhir_leger($row->nis,$m->idmapel)->result() as $nil){
			if($nil->akhir < $k->kkm){
			echo "<td align='center' bgcolor='yellow'>  $nil->akhir </td>";
			}
			else {
			echo "<td align='center'>  $nil->akhir </td>";
			}
			}
		}
		}
		} ?>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php
	$no++;
	}
	?>
	</table>
</div>
</body>
</html>