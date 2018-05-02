<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan PMP_Kelas ".$_GET['kelas']."_Pelajaran ".$_GET['namamapel']."_Semester ".$_GET['semester']." ?>.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html>
<head>
<title>Download Laporan PMP</title>
</head>

<body>
<div >
<CENTER>
<h2 >DAFTAR NILAI</h2>
<h2 >PEKAN MERAIH PRESTASI SISWA TAHUN <?php echo $_GET['tingkat']; ?></h2>
<h2 >TAHUN PELAJARAN <?php echo $_GET['thnajar']; ?></h2>
</CENTER>
	<table border='0'>
		<tr>
			<td>Hari/Tanggal</td>
			<td>:</td>
			<td><?php echo date('d-m-Y'); ?></td>
			<td></td>
			<td>Semester</td>
			<td>:</td>
			<td><?php echo $_GET['semester']; ?></td>
		</tr>
		<tr>
			<td>Mata Pelajaran</td>
			<td>:</td>
			<td><?php echo $_GET['namamapel']; ?></td>
			<td></td>
			<td>Tahun Ajaran</td>
			<td>:</td>
			<td><?php echo $_GET['thnajar']; ?></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><?php echo $_GET['kelas']; ?></td>
		</tr>
	</table>
<br>
	<table border='1'>
	<thead>
	<tr>
	<td>No</td>
	<td>No Induk</td>
    <td>NISN</td>
	<td>Nama Siswa</td>
	<td>Skor</td>
	<td>Nilai</td>
	<td>Keterangan</td>
	</tr>
	</thead>
	<?php 
	$no=1;
	foreach($list->result() as $row){ ?>
	<tr>
	
		<td><?php echo $no; ?></td>
		<td><?php echo $row->nis; ?></td>
		<td><?php echo $row->nisn; ?></td>
		<td><?php echo $row->siswa; ?></td>
		<td><?php echo $row->skor; ?></td>
		<td><?php echo $row->nilai; ?></td>
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